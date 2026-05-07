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

    public function pastWebinars(Request $request)
    {
        $query = Seminar::where('end_time', '<', now());
        
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where('title', 'like', '%' . $search . '%');
        }

        $seminars = $query->orderBy('end_time', 'desc')->paginate(6);
        return view('past-webinar', compact('seminars'));
    }

    // public function inputdatadiri()
    // {
    //     return view('detailseminar.inputdatadiri');
    // }
}
