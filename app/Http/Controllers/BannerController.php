<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Show banner list
     */
    public function index()
    {
        $banners = Banner::latest()->paginate(10);
        return view('banner.index', compact('banners'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('banner.create');
    }

    /**
     * Store banner
     */
    // public function store(Request $request)
    // {
    //     // Only superadmin
    //     if (auth()->user()->role !== 'superadmin') {
    //         abort(403);
    //     }

    //     $validated = $request->validate([
    //         'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
    //         'description' => 'nullable|string|max:255',
    //         'status' => 'nullable|boolean',
    //     ]);

    //     // Upload Image
    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $fileName = 'banner_' . md5(uniqid()) . '.' . $image->getClientOriginalExtension();
    //         $path = public_path().'/storage/banner';
    //         $uplaod = $request->image->move($path,$fileName);
    //     }

    //     Banner::create([
    //         'image' => $fileName,
    //         'description' => $validated['description'] ?? null,
    //         'status' => $request->has('status'),
    //     ]);

    //     return redirect()
    //         ->route('admin.banner')
    //         ->with('success', 'Banner created successfully.');
    // }

    public function store(Request $request)
    {
        // Only superadmin
        if (auth()->user()->role !== 'superadmin') {
            abort(403);
        }

        $validated = $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
        ]);

        // Upload Image
        $imagePath = $request->file('image')->store('banners', 'public');

        Banner::create([
            'image' => $imagePath,
            'description' => $validated['description'] ?? null,
            'status' => $request->has('status'),
        ]);

        return redirect()
            ->route('admin.banner')
            ->with('success', 'Banner created successfully.');
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('banner.edit', compact('banner'));
    }

    /**
     * Update banner
     */
    // public function update(Request $request, $id)
    // {
    //     $validated = $request->validate([
    //         'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    //         'description' => 'nullable|string|max:255',
    //         'status' => 'nullable|boolean',
    //     ]);

    //     $banner = Banner::findOrFail($id);

    //     if ($request->hasFile('image')) {

    //         $oldPath = public_path('storage/banner/' . $banner->image);
    //         if (file_exists($oldPath)) {
    //             unlink($oldPath);
    //         }

    //         $image = $request->file('image');
    //         $fileName = 'banner_' . uniqid() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('storage/banner'), $fileName);

    //         $banner->image = $fileName;
    //     }

    //     $banner->description = $validated['description'] ?? null;
    //     $banner->status = $request->has('status');
    //     $banner->save();

    //     return redirect()
    //         ->route('admin.banner')
    //         ->with('success', 'Banner updated successfully.');
    // }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
        ]);

        $banner = Banner::findOrFail($id);

        // Replace Image
        if ($request->hasFile('image')) {
            if ($banner->image && Storage::disk('public')->exists($banner->image)) {
                Storage::disk('public')->delete($banner->image);
            }

            $banner->image = $request->file('image')->store('banners', 'public');
        }

        $banner->description = $validated['description'] ?? null;
        $banner->status = $request->has('status');
        $banner->save();

        return redirect()
            ->route('admin.banner')
            ->with('success', 'Banner updated successfully.');
    }


    /**
     * Delete banner
     */
    // public function destroy($id)
    // {
    //     if (auth()->user()->role !== 'superadmin') {
    //         abort(403);
    //     }

    //     $banner = Banner::findOrFail($id);

    //     $imagePath = public_path('storage/banner/' . $banner->image);
 
    //     // Delete file if exists
    //     if (file_exists($imagePath)) {
    //         unlink($imagePath);
    //     }

    //     $banner->delete();

    //     return redirect()
    //         ->route('admin.banner')
    //         ->with('success', 'Banner deleted successfully.');
    // }

    public function destroy($id)
    {
        if (auth()->user()->role !== 'superadmin') {
            abort(403);
        }

        $banner = Banner::findOrFail($id);

        if ($banner->image && Storage::disk('public')->exists($banner->image)) {
            Storage::disk('public')->delete($banner->image);
        }

        $banner->delete();

        return redirect()
            ->route('admin.banner')
            ->with('success', 'Banner deleted successfully.');
    }
}
