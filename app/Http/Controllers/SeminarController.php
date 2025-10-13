<?php

namespace App\Http\Controllers;

use App\Models\Seminar;
use Illuminate\Http\Request;

class SeminarController extends Controller
{
    public function index()
    {
        $seminars = Seminar::all();
        return view('welcome', compact('seminars'));
    }

    public function show($id)

    {
        $seminar = Seminar::findOrFail($id);
        return view('detailseminar.detailcard', compact('seminar'));
    }

    // public function inputdatadiri()
    // {
    //     return view('detailseminar.inputdatadiri');
    // }
}
