<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::with('user')->latest()->get();
        return view('resources.index', compact('resources'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|file|max:10240' // 10MB max
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('resources', $fileName, 'public');

        auth()->user()->resources()->create([
            'title' => $request->title,
            'description' => $request->description,
            'file_name' => $fileName,
            'file_path' => $filePath,
            'file_type' => $file->getClientMimeType(),
            'file_size' => $file->getSize()
        ]);

        return back()->with('success', 'Resource uploaded successfully');
    }

    public function download(Resource $resource)
    {
        return Storage::disk('public')->download($resource->file_path, $resource->file_name);
    }

    public function destroy(Resource $resource)
    {
        $this->authorize('delete', $resource);
        
        Storage::disk('public')->delete($resource->file_path);
        $resource->delete();

        return back()->with('success', 'Resource deleted successfully');
    }
}