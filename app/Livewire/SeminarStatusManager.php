<?php

namespace App\Livewire;

use App\Models\Seminar;
use Livewire\Component;

class SeminarStatusManager extends Component
{
    public $seminarId;
    public $showModal = false;

    protected $listeners = ['openStatusModal' => 'openModal'];

    public function openModal($seminarId)
    {
        $this->seminarId = $seminarId;
        $this->showModal = true;
    }

    public function updateStatus($status)
    {
        $seminar = Seminar::find($this->seminarId);
        if ($seminar) {
            $seminar->status = $status;
            $seminar->save();

            $this->showModal = false;
            $this->dispatch('statusUpdated', message: 'Status updated successfully');
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->seminarId = null;
    }

    public function render()
    {
        return view('livewire.seminar-status-manager');
    }
}