<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainers = Trainer::all();
        return view('admin.trainers.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:trainers,email',
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string',
            'position' => 'nullable|string|max:255',
            'skills' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->except('image', 'skills');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/trainers');
            $data['image_url'] = Storage::url($path);
        }

        if ($request->filled('skills')) {
            $data['skills'] = array_map('trim', explode(',', $request->skills));
        }

        Trainer::create($data);

        return redirect()->route('admin.trainers.index')->with('success', 'Trainer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Trainer $trainer)
    {
        return view('admin.trainers.show', compact('trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trainer $trainer)
    {
        return view('admin.trainers.edit', compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trainer $trainer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:trainers,email,' . $trainer->id,
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string',
            'position' => 'nullable|string|max:255',
            'skills' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->except('image', 'skills');

        if ($request->hasFile('image')) {
            // Delete old image
            if ($trainer->image_url) {
                Storage::delete(str_replace('/storage', 'public', $trainer->image_url));
            }
            $path = $request->file('image')->store('public/trainers');
            $data['image_url'] = Storage::url($path);
        }

        if ($request->filled('skills')) {
            $data['skills'] = array_map('trim', explode(',', $request->skills));
        } else {
            $data['skills'] = [];
        }

        $trainer->update($data);

        return redirect()->route('admin.trainers.index')->with('success', 'Trainer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trainer $trainer)
    {
        if ($trainer->image_url) {
            Storage::delete(str_replace('/storage', 'public', $trainer->image_url));
        }
        $trainer->delete();

        return redirect()->route('admin.trainers.index')->with('success', 'Trainer deleted successfully.');
    }
}