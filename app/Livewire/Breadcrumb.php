<?php

namespace App\Livewire;

use Livewire\Component;

class Breadcrumb extends Component
{
    public $pageTitle;
    public $breadcrumbs = [];

    public function mount($pageTitle = '', $breadcrumbs = [])
    {
        $this->pageTitle = $pageTitle;
        $this->breadcrumbs = $breadcrumbs;
    }

    public function render()
    {
        return view('livewire.breadcrumb');
    }
}