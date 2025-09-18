<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Seminar;
use App\Models\MessageTemplate;
use App\Models\SeminarRegistration;
use App\Models\MessageLog;
use App\Mail\SeminarReminderMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class MessageSender extends Component
{
    public $seminars = [];
    public $templates = [];
    public $selectedSeminarId;
    public $selectedTemplateId;
    public $customSubject;
    public $customContent;
    public $isCustom = false;
    public $successMessage = '';
    public $errorMessage = '';
    public $sending = false;

    public function mount()
    {
        $this->seminars = Seminar::all();
        $this->templates = MessageTemplate::all();
        
        // Set default template
        $defaultTemplate = MessageTemplate::where('is_default', true)->first();
        if ($defaultTemplate) {
            $this->selectedTemplateId = $defaultTemplate->id;
            $this->customSubject = $defaultTemplate->subject;
            $this->customContent = $defaultTemplate->content;
        }
    }

    public function updatedSelectedTemplateId($value)
    {
        if (!$this->isCustom) {
            $template = MessageTemplate::find($value);
            if ($template) {
                $this->customSubject = $template->subject;
                $this->customContent = $template->content;
            }
        }
    }

    public function toggleCustom()
    {
        $this->isCustom = !$this->isCustom;
        if (!$this->isCustom) {
            $this->updatedSelectedTemplateId($this->selectedTemplateId);
        }
    }

    public function sendMessages()
    {
        $this->reset(['successMessage', 'errorMessage']);
        $this->sending = true;

        try {
            Log::info('Starting to send messages', [
                'selectedSeminarId' => $this->selectedSeminarId,
                'selectedTemplateId' => $this->selectedTemplateId,
                'isCustom' => $this->isCustom
            ]);
            
            // Validate inputs
            if (!$this->selectedSeminarId) {
                $this->errorMessage = 'Silakan pilih seminar.';
                $this->sending = false;
                return;
            }

            if ($this->isCustom && (empty($this->customSubject) || empty($this->customContent))) {
                $this->errorMessage = 'Subjek dan konten pesan harus diisi.';
                $this->sending = false;
                return;
            }

            // Get seminar
            $seminar = Seminar::findOrFail($this->selectedSeminarId);
            Log::info('Seminar found', ['seminar_id' => $seminar->id, 'title' => $seminar->title]);

            // Get template
            $template = $this->isCustom ? 
                new MessageTemplate([
                    'subject' => $this->customSubject,
                    'content' => $this->customContent
                ]) : 
                MessageTemplate::findOrFail($this->selectedTemplateId);
                
            Log::info('Template selected', ['template_id' => $template->id ?? 'custom']);

            // Get registrations
            $registrations = SeminarRegistration::where('seminar_id', $seminar->id)->get();
            Log::info('Registrations found', ['count' => $registrations->count()]);

            if ($registrations->isEmpty()) {
                $this->errorMessage = 'Tidak ada pendaftar untuk seminar ini.';
                $this->sending = false;
                return;
            }

            // Send emails
            $sentCount = 0;
            $errors = [];

            foreach ($registrations as $registration) {
                try {
                    Log::info('Sending email to registration', [
                        'registration_id' => $registration->id,
                        'email' => $registration->email
                    ]);
                    
                    Mail::to($registration->email)->send(
                        new SeminarReminderMail($seminar, $registration, $template)
                    );
                    $sentCount++;
                    Log::info('Email sent successfully', ['registration_id' => $registration->id]);
                } catch (\Exception $e) {
                    Log::error('Failed to send email', [
                        'registration_id' => $registration->id,
                        'email' => $registration->email,
                        'error' => $e->getMessage()
                    ]);
                    $errors[] = "Gagal mengirim email ke {$registration->email}: " . $e->getMessage();
                }
            }

            // Log message
            $logData = [
                'seminar_id' => $seminar->id,
                'template_id' => $this->isCustom ? null : $template->id,
                'recipient_count' => $registrations->count(),
                'status' => $sentCount == $registrations->count() ? 'success' : ($sentCount > 0 ? 'partial' : 'failed'),
                'error_message' => !empty($errors) ? implode('; ', $errors) : null
            ];
            
            MessageLog::create($logData);
            Log::info('Message log created', $logData);

            // Set success message
            if ($sentCount == $registrations->count()) {
                $this->successMessage = "Pesan berhasil dikirim ke {$sentCount} pendaftar.";
            } else if ($sentCount > 0) {
                $this->successMessage = "Pesan berhasil dikirim ke {$sentCount} dari {$registrations->count()} pendaftar.";
                if (!empty($errors)) {
                    $this->errorMessage = implode('; ', $errors);
                }
            } else {
                $this->errorMessage = "Gagal mengirim pesan ke semua pendaftar.";
                if (!empty($errors)) {
                    $this->errorMessage .= " " . implode('; ', $errors);
                }
            }
        } catch (\Exception $e) {
            Log::error('Error in sendMessages method', ['error' => $e->getMessage()]);
            $this->errorMessage = "Terjadi kesalahan: " . $e->getMessage();
        }

        $this->sending = false;
    }

    public function render()
    {
        return view('livewire.admin.message-sender');
    }
}
