<?php

namespace App\Livewire;

use Livewire\Component;

class SeminarCard extends Component
{
    public $title;
    public $description;
    public $imageUrl;

    public function mount($title, $description, $imageUrl)
    {
        $this->title = $title;
        $this->description = $description;
        $this->imageUrl = $imageUrl;
    }

    public function render()
    {
        return view('livewire.seminar-card');
    }
}
