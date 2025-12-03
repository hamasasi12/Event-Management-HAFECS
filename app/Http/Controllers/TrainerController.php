<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

use Vinkla\Hashids\Facades\Hashids;

class TrainerController extends Controller
{
    public function show($hashid)
    {
        $id = Hashids::decode($hashid)[0] ?? null;
        $trainer = Trainer::with(['seminars' => function($query) {
            $query->whereIn('status', ['upcoming', 'active', 'completed'])
                  ->orderBy('start_time', 'desc');
        }])->findOrFail($id);

        return view('trainers.show', compact('trainer'));
    }
}
