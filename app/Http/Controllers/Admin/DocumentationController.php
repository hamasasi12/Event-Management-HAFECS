<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Documentation;
use App\Services\DocumentationService;
use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    protected $service;

    public function __construct(DocumentationService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $documentations = $this->service->getAllPaginated();
        return view('admin.documentations.index', compact('documentations'));
    }

    public function create()
    {
        return view('admin.documentations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url|max:255',
        ]);

        $data = $request->except('image');
        $this->service->createDocumentation($data, $request->file('image'));

        return redirect()->route('admin.documentations.index')->with('success', 'Dokumentasi berhasil ditambahkan.');
    }

    public function edit(Documentation $documentation)
    {
        return view('admin.documentations.edit', compact('documentation'));
    }

    public function update(Request $request, Documentation $documentation)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url|max:255',
        ]);

        $data = $request->except('image');
        $this->service->updateDocumentation($documentation, $data, $request->file('image'));

        return redirect()->route('admin.documentations.index')->with('success', 'Dokumentasi berhasil diperbarui.');
    }

    public function destroy(Documentation $documentation)
    {
        $this->service->deleteDocumentation($documentation);

        return redirect()->route('admin.documentations.index')->with('success', 'Dokumentasi berhasil dihapus.');
    }
}
