<?php

namespace App\Services;

use App\Http\Requests\SeminarRequest;
use App\Models\Seminar;
use App\Models\Trainer;
use App\Repositories\TrainerRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Vinkla\Hashids\Facades\Hashids;

class SeminarService
{
    protected $repo;
    public function __construct(TrainerRepository $repo)
    {
        $this->repo = $repo;
    }
    // ----------------------------------------------------------------------

    public function getSeminarLatest()
    {
        $seminars = Seminar::latest()->get();
        return $seminars;
    }

    public function getSeminarByHashid($seminar_hashid)
    {
        $id = Hashids::decode($seminar_hashid)[0] ?? null;
        if (!$id) {
            return null;
        }
        return Seminar::findOrFail($id);
    }

    public function createSeminar(array $data)
    {
        if (isset($data['image']) && $data['image'] instanceof \Illuminate\Http\UploadedFile) {
            $imagePath = $data['image']->store('seminars', 'public');
            $data['image_url'] = Storage::url($imagePath);
        }

        unset($data['image']);

        if (isset($data['trainer_id']) && $data['trainer_id'] === 'other') {
            $data['trainer_id'] = null;
        }

        return Seminar::create($data);
    }

    public function updateSeminar(Seminar $seminar, array $data)
    {
        if (isset($data['image']) && $data['image'] instanceof \Illuminate\Http\UploadedFile) {
            if ($seminar->image_url) {
                $oldImagePath = str_replace('/storage', 'public', $seminar->image_url);
                if (Storage::exists($oldImagePath)) {
                    Storage::delete($oldImagePath);
                }
            }

            $imagePath = $data['image']->store('seminars', 'public');
            $data['image_url'] = Storage::url($imagePath);
        }

        unset($data['image']);

        if (isset($data['trainer_id']) && $data['trainer_id'] === 'other') {
            $data['trainer_id'] = null;
        }

        $seminar->update($data);

        return $seminar;
    }

    public function deleteSeminar(Seminar $seminar)
    {
        if ($seminar->image_url) {
            $imagePath = str_replace('/storage', 'public', $seminar->image_url);
            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }
        }

        return $seminar->delete();
    }

    public function getActiveSeminars()
    {
        return Seminar::where('status', 'active')->get();
    }

    public function generateAttendanceQr(Seminar $seminar)
    {
        try {
            $token = Str::random(32);

            $attendance = \App\Models\Attendance::create([
                'seminar_id' => $seminar->id,
                'token' => $token,
            ]);

            $link = route('attend.form', [
                'seminar_hashid' => Hashids::encode($seminar->id),
                'token' => $token
            ]);

            $qrCodeSvg = QrCode::format('svg')
                ->size(300)
                ->generate($link);

            return [
                'success' => true,
                'title' => $seminar->title,
                'link' => $link,
                'qr' => (string) $qrCodeSvg,
                'attendance' => $attendance,
            ];
        } catch (\Exception $e) {
            Log::error('Error generating QR code: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Failed to generate QR code'
            ];
        }
    }

    public function getSeminarRegistrants(Seminar $seminar)
    {
        return $seminar->load('registrations.user');
    }

    public function storeSeminar(SeminarRequest $request)
    {
        $request->validated();
        $data = $request->except(['image']);
        if ($request->trainer_id === 'other') {
            $data['trainer_id'] = null;
        }
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('seminars', 'public');
            $data['image_url'] = Storage::url($imagePath);
        }
        Seminar::create($data);
    }

    public function ShowSeminar($seminar_hashid)
    {
        $id = Hashids::decode($seminar_hashid)[0] ?? null;
        $seminar = Seminar::findOrFail($id);
        return $seminar;
    }

    public function EditSeminar($seminar_hashid)
    {
        $id = Hashids::decode($seminar_hashid)[0] ?? null;
        $seminar = Seminar::findOrFail($id);
        $trainers = $this->repo->getAllTrainers();
        return compact('seminar', 'trainers');
    }
}
