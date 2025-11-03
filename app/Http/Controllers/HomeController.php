<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer;
use App\Models\Seminar;

class HomeController extends Controller
{
    public function index()
    {
        $trainers = Trainer::where('status', 'active')->get();
        $seminars = Seminar::all();
        
        return view('welcome', compact('trainers', 'seminars'));
    }
}
