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

    public function show($slug, $hashid)
    {
        $id = Hashids::decode($hashid)[0] ?? null;
        $seminar = Seminar::with('trainer')->findOrFail($id);

        // Fetch up to 3 upcoming seminars excluding the current one
        $recommendations = Seminar::with('trainer')
            ->where('id', '!=', $seminar->id)
            ->where('start_time', '>=', now())
            ->orderBy('start_time', 'asc')
            ->take(3)
            ->get();

        // If less than 3 upcoming, pad with past seminars
        if ($recommendations->count() < 3) {
            $additional = Seminar::with('trainer')
                ->where('id', '!=', $seminar->id)
                ->whereNotIn('id', $recommendations->pluck('id')->toArray())
                ->orderBy('created_at', 'desc')
                ->take(3 - $recommendations->count())
                ->get();
            $recommendations = $recommendations->concat($additional);
        }

        return view('detailseminar.detailcard', compact('seminar', 'recommendations'));
    }

    public function pastWebinars(Request $request)
    {
        $query = Seminar::where('end_time', '<', now());
        
        if ($request->filled('search')) {
            $search = $request->input('search');
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
