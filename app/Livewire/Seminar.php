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
        $query = SeminarModel::query()->withCount([
            'registrations as access_seminar_registrations_count' => function ($q) {
                $q->whereHas('user', fn($u) => $u->permission('access_seminar'));
            }
        ]);

        if ($this->search) {
            $query->where('title', 'like', '%' . $this->search . '%');
        }

        if ($this->status) {
            $query->where('status', $this->status);
        }

        if ($this->dateFrom) {
            $query->whereDate('start_time', '>=', $this->dateFrom);
        }

        if ($this->dateTo) {
            $query->whereDate('end_time', '<=', $this->dateTo);
        }

        $seminars = $query->get();

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