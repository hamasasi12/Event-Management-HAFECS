<?php

namespace App\Livewire\Admin;

use App\Models\Trainer;
use Livewire\Component;
use Livewire\WithPagination;

class TrainerIndex extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $trainers = Trainer::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('livewire.admin.trainer-index', [
            'trainers' => $trainers
        ]);
    }
}
