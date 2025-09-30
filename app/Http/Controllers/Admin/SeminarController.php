<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seminar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SeminarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seminars = Seminar::latest()->get();


        return view('admin.seminars.index', compact('seminars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.seminars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $price = null;
        $link = null;

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'type' => 'required|string',
            'link' => 'required|string',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:upcoming,active,completed,cancelled',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $data = $request->except('image');
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('seminars', 'public');
            $data['image_url'] = Storage::url($imagePath);
        }

        Seminar::create($data);

        return redirect()->route('admin.seminars.index')
            ->with('success', 'Seminar created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Seminar $seminar)
    {
        return view('admin.seminars.show', compact('seminar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seminar $seminar)
    {
        return view('admin.seminars.edit', compact('seminar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seminar $seminar)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:upcoming,active,completed,cancelled',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('image');
        
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($seminar->image_url) {
                $oldImagePath = str_replace('/storage', 'public', $seminar->image_url);
                if (Storage::exists($oldImagePath)) {
                    Storage::delete($oldImagePath);
                }
            }
            
            $imagePath = $request->file('image')->store('seminars', 'public');
            $data['image_url'] = Storage::url($imagePath);
        }

        $seminar->update($data);

        return redirect()->route('admin.seminars.index')
            ->with('success', 'Seminar updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */ 
    public function destroy(Seminar $seminar)
    {
        // Delete image if exists
        if ($seminar->image_url) {
            $imagePath = str_replace('/storage', 'public', $seminar->image_url);
            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }
        }

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        $seminar->delete();



        return redirect()->route('admin.seminars.index')
            ->with('success', 'Seminar deleted successfully.');
    }
}