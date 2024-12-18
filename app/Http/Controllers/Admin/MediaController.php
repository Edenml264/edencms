<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    public function index()
    {
        $media = Media::latest()->paginate(12);
        return view('admin.media.index', compact('media'));
    }

    public function create()
    {
        return view('admin.media.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('filepond')) {
            $files = $request->file('filepond');
            if (!is_array($files)) {
                $files = [$files];
            }

            foreach ($files as $file) {
                $request->validate([
                    'filepond' => 'file|max:10240', // max 10MB
                ]);

                $fileName = $file->getClientOriginalName();
                $name = pathinfo($fileName, PATHINFO_FILENAME);
                
                // Generate unique filename
                $uniqueFileName = Str::slug($name) . '_' . time() . '.' . $file->getClientOriginalExtension();
                
                // Store file
                $path = $file->storeAs('media', $uniqueFileName, 'public');

                // Create media record
                Media::create([
                    'name' => $name,
                    'file_name' => $uniqueFileName,
                    'mime_type' => $file->getMimeType(),
                    'path' => $path,
                    'size' => $file->getSize(),
                ]);
            }

            if ($request->wantsJson()) {
                return response()->json(['success' => true]);
            }

            return redirect()->route('admin.media.index')
                ->with('success', 'Media uploaded successfully');
        }

        return response()->json(['error' => 'No files uploaded'], 400);
    }

    public function destroy(Media $medium)
    {
        // Delete file from storage
        Storage::disk('public')->delete($medium->path);
        
        // Delete record
        $medium->delete();

        return redirect()->route('admin.media.index')
            ->with('success', 'Media deleted successfully');
    }
}
