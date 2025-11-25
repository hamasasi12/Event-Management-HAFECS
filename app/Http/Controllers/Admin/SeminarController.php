<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Seminar;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Vinkla\Hashids\Facades\Hashids;

class SeminarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $seminars = Seminar::latest()->get();
        

        // $title = 'Delete User!';
        // $text = "Are you sure you want to delete?";
        // confirmDelete($title, $text);


        return view('admin.seminars.index', compact('seminars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trainers = Trainer::all();
        return view('admin.seminars.create', compact('trainers'));
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
            'trainer_id' => 'nullable|exists:trainers,id',
            'materi' => 'nullable|string',
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
    public function show($seminar_hashid)
    {
        $id = Hashids::decode($seminar_hashid)[0] ?? null;
        $seminar = Seminar::findOrFail($id);
        return view('admin.seminars.show', compact('seminar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($seminar_hashid)
    {
        $id = Hashids::decode($seminar_hashid)[0] ?? null;
        $seminar = Seminar::findOrFail($id);
        $trainers = Trainer::all();
        return view('admin.seminars.edit', compact('seminar', 'trainers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $seminar_hashid)
    {
        $id = Hashids::decode($seminar_hashid)[0] ?? null;
        $seminar = Seminar::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:upcoming,active,completed,cancelled',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'trainer_id' => 'nullable|exists:trainers,id',
            'materi' => 'nullable|string',
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
        } else {
            // If no image is uploaded, still update the other fields
            $seminar->update($data);
        }

        // If it's an AJAX request, return JSON response
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Seminar updated successfully',
                'seminar' => $seminar
            ]);
        }

        return redirect()->route('admin.seminars.index')
            ->with('success', 'Seminar updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($seminar_hashid)
    {
        $id = Hashids::decode($seminar_hashid)[0] ?? null;
        $seminar = Seminar::findOrFail($id);

        // Delete image if exists
        if ($seminar->image_url) {
            $imagePath = str_replace('/storage', 'public', $seminar->image_url);
            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }
        }


        $seminar->delete();

        return redirect()->route('admin.seminars.index')
            ->with('success', 'Seminar deleted successfully.');
    }

    /**
     * Display active seminars for attendance
     */
    public function activeSeminars()
    {
        // Get seminars that are currently active (between start_time and end_time)
        $activeSeminars = Seminar::where('status', 'active')
            // ->where('start_time', '<=', now())
            // ->where('end_time', '>=', now())
            ->get();

        return view('admin.attendance.index', compact('activeSeminars'));
    }

    /**
     * Display registrants for a specific seminar
     */
    public function registrants($seminar_hashid)
    {
        $id = Hashids::decode($seminar_hashid)[0] ?? null;
        $seminar = Seminar::findOrFail($id);

        // Load the seminar with its registrants
        $seminar->load('registrations.user');

        return view('admin.attendance.registrants', compact('seminar'));
    }

    /**
     * Start presentation mode for a seminar (generate QR code)
     */
    public function startPresentation(Request $request, $seminar_hashid)
    {
        $id = Hashids::decode($seminar_hashid)[0] ?? null;
        $seminar = Seminar::findOrFail($id);

        try {
            // Generate token unik
            $token = Str::random(32);

            // Create attendance record
            $attendance = Attendance::create([
                'seminar_id' => $seminar->id,
                'token' => $token,
            ]);

            // Buat link untuk absensi
            $link = route('attend.form', ['seminar_hashid' => $seminar_hashid, 'token' => $token]);

            // Generate QR code as SVG
            $qrCodeSvg = QrCode::format('svg')
                ->size(300)
                ->generate($link);

            return response()->json([
                'success' => true,
                'title' => $seminar->title,
                'link' => $link,
                'qr' => (string) $qrCodeSvg,
            ]);
        } catch (\Exception $e) {
            Log::error('Error generating QR code: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to generate QR code'
            ], 500);
        }
    }
}
