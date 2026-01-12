<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    /**
     * Display the home page.
     *
     * @return View
     */
    public function home(): View
    {
        return view('pages.home');
    }

    /**
     * Display the about page.
     *
     * @return View
     */
    public function about(): View
    {
        return view('pages.about');
    }

    /**
     * Display the contact page.
     *
     * @return View
     */
    public function contact(): View
    {
        $files = Storage::disk('public')->files('pricelists');
        if (!empty($files)) {
            usort($files, function ($a, $b) {
                return Storage::lastModified($b) <=> Storage::lastModified($a);
            });
            $latestFile = basename(array_shift($files));
            $priceListUrl = route('admin.pricelist.show', ['filename' => $latestFile]);
        } else {
            $priceListUrl = '#'; // Default link if no file is found
        }

        return view('pages.contact', ['priceListUrl' => $priceListUrl]);
    }

    /**
     * Display the register page.
     *
     * @return View
     */
    public function register(): View
    {
        return view('pages.register');
    }

    /**
     * Display the terms and conditions page.
     *
     * @return View
     */
    public function terms(): View
    {
        return view('pages.terms');
    }

}
