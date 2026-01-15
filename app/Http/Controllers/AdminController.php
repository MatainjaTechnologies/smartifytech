<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Price_list;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $priceLists = Price_list::orderBy('id', 'desc')->withCount('products')->get();
        return view('admin.index',compact('priceLists'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'price_list' => 'required|file|mimes:pdf|max:10240',
        ]);

        $file = $request->file('price_list');

        // Original filename
        $originalName = $file->getClientOriginalName();

        // Unique filename
        $fileName = 'pricelist_' . time() . '_' . Str::slug(pathinfo($originalName, PATHINFO_FILENAME)) . '.pdf';

        // Store file
        $path = $file->storeAs('pricelists', $fileName, 'public');

        // Save in DB
        Price_list::create([
            'file_name' => $fileName,
            'status'    => 1,
        ]);

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

    public function changePasswordForm()
    {
        return view('admin.change_password');
    }

    public function changePasswordUpdate(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('password_success', 'Password updated successfully.');
    }
}
