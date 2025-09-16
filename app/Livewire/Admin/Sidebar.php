<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Route;

class Sidebar extends Component
{
    public function render()
    {
        // Determine current page based on the route
        $currentPage = '';
        $currentRoute = Route::currentRouteName();
        
        if ($currentRoute === 'admin.dashboard') {
            $currentPage = 'dashboard';
        } elseif (str_starts_with($currentRoute, 'admin.users')) {
            $currentPage = 'pendaftaran';
        } elseif (str_starts_with($currentRoute, 'admin.seminars')) {
            $currentPage = 'seminar';
        } elseif (str_starts_with($currentRoute, 'admin.calendar')) {
            $currentPage = 'calendar';
        } elseif (str_starts_with($currentRoute, 'admin.profile')) {
            $currentPage = 'profile';
        }
        
        return view('livewire.admin.sidebar', [
            'page' => $currentPage
        ]);
    }
}