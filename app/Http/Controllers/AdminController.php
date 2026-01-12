<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'price_list' => 'required|mimes:pdf|max:10240',
        ]);

        $path = $request->file('price_list')->store('pricelists', 'public');

        return back()->with('success', 'Price list uploaded successfully.');
    }

    public function showPriceList($filename)
    {
        $path = 'pricelists/' . $filename;

        // Log the path being checked for debugging
        \Log::info('Checking for file at path: ' . $path);

        if (!Storage::disk('public')->exists($path)) {
            \Log::error('File not found at path: ' . $path);
            abort(404);
        }

        $file = Storage::disk('public')->get($path);
        $mimeType = Storage::disk('public')->mimeType($path);

        return response($file, 200, ['Content-Type' => $mimeType]);
    }
}
