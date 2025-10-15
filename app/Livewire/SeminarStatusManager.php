<?php

namespace App\Livewire;

use App\Models\Seminar;
use Livewire\Component;

class SeminarStatusManager extends Component
{
    public $seminarId;
    public $newStatus;
    public $showPopup = false;
    public $position = ['top' => 0, 'left' => 0];
    protected $listeners = ['toggleStatusPopup' => 'togglePopup'];

    public function togglePopup($seminarId, $position = null)
    {
        if ($seminarId == 0) {
            $this->showPopup = false;
        } elseif ($this->seminarId === $seminarId) {
            $this->showPopup = !$this->showPopup;
        } else {
            $this->seminarId = $seminarId;
            $seminar = Seminar::find($seminarId);
            if ($seminar) {
                $this->newStatus = $seminar->status;
                $this->position = $position ?? ['top' => 0, 'left' => 0];
                $this->showPopup = true;
            }
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
