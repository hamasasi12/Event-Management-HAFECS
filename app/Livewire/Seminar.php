<?php

namespace App\Livewire;

use App\Models\Seminar as SeminarModel;
use App\Models\SeminarRegistration;
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
        $seminars = SeminarModel::withCount([
            'registrations as access_seminar_registrations_count' => function ($q) {
                $q->whereHas('user', fn($u) => $u->permission('access_seminar'));
            }
        ])->get();

        if ($this->search) {
            $seminars->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->status) {
            $seminars->where(function ($q) {
                $q->where('status', 'like', '%' . $this->status . '%');
            });
        }

        if ($this->dateFrom) {
            $seminars->whereDate('start_time', '>=', $this->dateFrom);
        }

        if ($this->dateTo) {
            $seminars->whereDate('end_time', '<=', $this->dateTo);
        }


        return view('livewire.seminar', [
            'seminars' => $seminars
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