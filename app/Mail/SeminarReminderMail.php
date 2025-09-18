<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use App\Models\Seminar;
use App\Models\SeminarRegistration;
use App\Models\MessageTemplate;

class SeminarReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public Seminar $seminar;
    public SeminarRegistration $registration;
    public MessageTemplate $template;

    /**
     * Create a new message instance.
     */
    public function __construct(Seminar $seminar, SeminarRegistration $registration, MessageTemplate $template)
    {
        $this->seminar = $seminar;
        $this->registration = $registration;
        $this->template = $template;
        
        Log::info('Creating SeminarReminderMail', [
            'seminar_id' => $seminar->id,
            'registration_id' => $registration->id,
            'template_id' => $template->id ?? 'custom'
        ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        try {
            // Replace placeholders in subject
            $subject = $this->template->subject;
            $subject = str_replace('{{ $seminar->title }}', $this->seminar->title, $subject);
            
            Log::info('Email subject created', ['subject' => $subject]);
            
            return new Envelope(
                subject: $subject,
            );
        } catch (\Exception $e) {
            Log::error('Error creating email envelope', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        try {
            // Replace placeholders in content
            $content = $this->template->content;
            $content = str_replace('{{ $seminar->title }}', $this->seminar->title, $content);
            $content = str_replace('{{ $seminar->start_time->format("d M Y H:i") }}', $this->seminar->start_time->format("d M Y H:i"), $content);
            $content = str_replace('{{ $seminar->link }}', $this->seminar->link ?? '', $content);
            $content = str_replace('{{ $registration->name }}', $this->registration->name, $content);
            
            Log::info('Email content created', ['content_length' => strlen($content)]);
            
            return new Content(
                htmlString: $content
            );
        } catch (\Exception $e) {
            Log::error('Error creating email content', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
