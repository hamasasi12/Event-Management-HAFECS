<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class LoginModal extends Component
{
    public $isOpen = false;

    #[On('open-login-modal')]
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
        return view('livewire.login-modal');
    }
}
