<?php

namespace App\Services;

use App\Models\Documentation;
use Illuminate\Support\Facades\Storage;

class DocumentationService
{
    public function getAllPaginated($perPage = 10)
    {
        return Documentation::latest()->paginate($perPage);
    }

    public function createDocumentation(array $data, $imageFile = null)
    {
        if ($imageFile) {
            $data['image'] = $imageFile->store('documentations', 'public');
        }

        return Documentation::create($data);
    }

    public function updateDocumentation(Documentation $documentation, array $data, $imageFile = null)
    {
        if ($imageFile) {
            if ($documentation->image) {
                Storage::disk('public')->delete($documentation->image);
            }
            $data['image'] = $imageFile->store('documentations', 'public');
        }

        return $documentation->update($data);
    }

    public function deleteDocumentation(Documentation $documentation)
    {
        if ($documentation->image) {
            Storage::disk('public')->delete($documentation->image);
        }
        return $documentation->delete();
    }
}
