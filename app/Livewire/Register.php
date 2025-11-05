<?php

namespace App\Livewire;

use App\Models\SeminarRegistration;
use Livewire\Component;

class Register extends Component
{
    public $search = '';
    public $seminar = '';
    public $name = '';

    public function render()
    {
        $query = SeminarRegistration::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('email', 'like', '%' . $this->search . '%')
                  ->orWhere('phone', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->seminar) {
            $query->whereHas('seminar', function ($q) {
                $q->where('title', 'like', '%' . $this->seminar . '%');
            });
        }

        if ($this->name) {
            $query->where('name', 'like', '%' . $this->name . '%');
        }

        return view('livewire.register', [
            'seminarRegistration' => $query->latest()->get(),
        ]);
    }

    public function resetFilters()
    {
        $this->reset(['search', 'seminar', 'name']);
    }
}