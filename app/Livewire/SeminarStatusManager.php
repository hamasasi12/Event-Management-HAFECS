<?php

namespace App\Livewire;

use App\Models\Seminar;
use Livewire\Component;

class SeminarStatusManager extends Component
{
    public $seminarId;
    public $newStatus;
    public $showPopup = false;
    protected $listeners = [
        'toggleStatusPopup' => 'togglePopup',
        'closeOtherPopups' => 'closePopup'
    ];

    public function togglePopup($data)
    {
        // Pastikan $data adalah array sebelum diakses
        if (is_array($data) && isset($data[0])) {
            $seminarId = $data[0];
        } elseif (is_array($data) && isset($data['seminarId'])) {
            $seminarId = $data['seminarId'];
        } elseif (!is_array($data)) {
            $seminarId = $data;
        } else {
            $seminarId = null;
        }

        if ($seminarId == 0 || $seminarId === null) {
            $this->showPopup = false;
        } elseif ($this->seminarId === $seminarId) {
            $this->showPopup = !$this->showPopup;
        } else {
            // Hanya update komponen ini jika ID sesuai
            // Jika bukan komponen ini yang dituju, jangan lakukan apa-apa
            return;
        }
        
        // Dispatch event untuk menutup popup lain
        if ($this->showPopup) {
            $this->dispatch('closeOtherPopups', except: $this->seminarId);
        }
    }
    
    public function closePopup($except = null)
    {
        if ($this->seminarId != $except) {
            $this->showPopup = false;
        }
    }

    public function updateStatus()
    {
        $this->validate([
            'newStatus' => 'required|in:upcoming,active,completed,cancelled'
        ]);

        $seminar = Seminar::find($this->seminarId);

        if ($seminar) {
            $seminar->update(['status' => $this->newStatus]);

            $this->dispatch(
                'statusUpdated',
                message: 'Status updated successfully',
                status: $this->newStatus,
                seminarId: $seminar->id
            );
        } else {
            session()->flash('error', 'Seminar not found');
        }

        $this->showPopup = false;
    }

    public function render()
    {
        $seminar = $this->seminarId ? Seminar::find($this->seminarId) : null;
        return view('livewire.seminar-status-manager', ['seminar' => $seminar]);
    }
}
