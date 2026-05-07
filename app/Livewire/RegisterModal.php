<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class RegisterModal extends Component
{
    public $isOpen = false;

    #[On('open-register-modal')]
    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.register-modal');
    }
}
