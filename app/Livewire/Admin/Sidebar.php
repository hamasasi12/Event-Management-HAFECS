<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Route;

class Sidebar extends Component
{

    public string $activeRoute;
    public function mount(){
        $this->activeRoute = Route::currentRouteName();
    }

    public function render()
    {
        
        return view('livewire.admin.sidebar',);
    }

}