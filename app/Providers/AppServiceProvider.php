<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share priceListUrl with all views
        View::composer('*', function ($view) {
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
            
            $view->with('priceListUrl', $priceListUrl);
        });
    }
}
