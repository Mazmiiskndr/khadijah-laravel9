<?php

namespace App\Providers;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Mengambil data contact dan melewatkan ke view
        View::composer('components.frontend.footer', function ($view) {
            $contact = Contact::with('province','city','district')->first();
            $view->with('contact', $contact);
        });
        View::composer('components.frontend.top-header', function ($view) {
            $contact = Contact::with('province','city','district')->first();
            $view->with('contact', $contact);
        });
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        Schema::defaultStringLength(200);
    }
}
