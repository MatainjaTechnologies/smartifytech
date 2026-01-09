<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

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
        return view('pages.contact');
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
