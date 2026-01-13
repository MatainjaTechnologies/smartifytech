<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

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
                return Storage::disk('public')->lastModified($b) <=> Storage::disk('public')->lastModified($a);
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

    /**
     * Send a test email.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function testEmail(Request $request)
    {
        try {
            $to = $request->get('to', 'test@example.com'); // Get from query parameter or use default
            $subject = 'Test Email from Smartify Tech';
            $message = 'This is a test email to verify the mail configuration is working correctly.';
            
            Mail::raw($message, function ($mail) use ($to, $subject) {
                $mail->to($to)
                     ->subject($subject)
                     ->from(config('mail.from.address'), config('mail.from.name'));
            });
            
            Log::info('Test email sent successfully to: ' . $to);
            
            return response()->json([
                'status' => 'success',
                'message' => 'Test email sent successfully to ' . $to
            ]);
            
        } catch (\Exception $e) {
            Log::error('Failed to send test email: ' . $e->getMessage());
            
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to send test email: ' . $e->getMessage()
            ], 500);
        }
    }

}
