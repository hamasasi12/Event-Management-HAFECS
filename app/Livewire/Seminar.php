<?php

namespace App\Livewire;

use App\Models\Seminar as SeminarModel;
use Livewire\Component;

class Seminar extends Component
{
    public $search = '';
    public $status = '';
    public $dateFrom = '';
    public $dateTo = '';

    protected $listeners = ['statusUpdated' => '$refresh'];

    public function render()
    {
        $query = SeminarModel::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->status) {
            $query->where(function ($q) {
                $q->where('status', 'like', '%' . $this->status . '%');
            });
        }

        if ($this->dateFrom) {
            $query->whereDate('start_time', '>=', $this->dateFrom);
        }

        if ($this->dateTo) {
            $query->whereDate('end_time', '<=', $this->dateTo);
        }


        return view('livewire.seminar', [
            'seminars' => $query->latest()->get(),
        ]);
    }

    public function resetFilters()
    {
        $this->reset(['search', 'seminar', 'name']);
    }

    public function toggleStatusPopup($seminarId)
    {
        $this->dispatch('openStatusModal', $seminarId);
    }
}