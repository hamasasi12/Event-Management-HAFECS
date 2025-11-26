<?php

namespace App\Http\Controllers;

use App\Models\Seminar;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;

class SeminarController extends Controller
{
    public function index()
    {
        $seminars = Seminar::all();
        return view('welcome', compact('seminars'));
    }

    public function show($hashid)

    {
        $id = Hashids::decode($hashid)[0] ?? null;
        $seminar = Seminar::with('trainer')->findOrFail($id);
        return view('detailseminar.detailcard', compact('seminar'));
    }

    // public function inputdatadiri()
    // {
    //     return view('detailseminar.inputdatadiri');
    // }
}
