<?php

namespace App\Services;

use App\Models\Seminar;
use App\Models\Trainer;
use App\Models\Setting;

class HomeService
{
    public function getHomeData()
    {
        $trainers = Trainer::where('status', 'active')->get();
        $seminars = Seminar::all();
        $settings = Setting::pluck('value', 'key')->toArray();
        $documentations = \App\Models\Documentation::latest()->get();
        return compact('trainers', 'seminars', 'settings', 'documentations');
    }
}
