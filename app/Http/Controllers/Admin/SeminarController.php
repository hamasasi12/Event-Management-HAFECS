<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeminarRequest;
use App\Models\Attendance;
use App\Models\Seminar;
use App\Models\Trainer;
use App\Repositories\TrainerRepository;
use App\Services\SeminarService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Vinkla\Hashids\Facades\Hashids;

class SeminarController extends Controller
{
    protected $service;
    protected $repo;
    public function __construct(SeminarService $service, TrainerRepository $repo)
    {
        $this->service = $service;
        $this->repo = $repo;
    }
    // ----------------------------------------------------------------------

    public function index() {
        $seminars = $this->service->getSeminarLatest();
        return view('admin.seminars.index', compact('seminars'));
    }

    public function create() {
        $trainers = $this->repo->getAllTrainers();
        return view('admin.seminars.create', compact('trainers'));
    }

    public function store(SeminarRequest $request) {
        $this->service->storeSeminar($request);
        return redirect()
            ->route('admin.seminars.index')
            ->with('success', 'Seminar created successfully.');
    }

    public function show($seminar_hashid) {
        $seminar = $this->service->ShowSeminar($seminar_hashid);
        return view('admin.seminars.show', compact('seminar'));
    }

    public function edit($seminar_hashid) {
        $data = $this->service->EditSeminar($seminar_hashid);
        return view('admin.seminars.edit', $data);
    }

    public function update(SeminarRequest $request, $seminar_hashid) {


        
        $id = Hashids::decode($seminar_hashid)[0] ?? null;
        $seminar = Seminar::findOrFail($id);
        $request->validated();
        $data = $request->except(['image']);

        if ($request->trainer_id === 'other') {
            $data['trainer_id'] = null;
        }

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
            $link = route('attend.form', ['seminar_hashid' => Hashids::encode($seminar->id), 'token' => $token]);

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
