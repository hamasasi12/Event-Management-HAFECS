<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Seminar;

class SeminarCard extends Component
{
    public Seminar $seminar;

    public function mount(Seminar $seminar)
    {
        $this->seminar = $seminar;
    }

    public function render()
    {
        return view('livewire.seminar-card');
    }
}
