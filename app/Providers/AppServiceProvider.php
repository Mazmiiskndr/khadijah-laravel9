<?php

namespace App\Providers;

use App\Models\Contact;
use App\Services\ApiRajaOngkir\ApiRajaOngkirService;
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
    public function boot(ApiRajaOngkirService $apiRajaOngkirService)
    {
        // Retrieve contact data with its associated province, city, and district
        $contact = Contact::first();

        // If a city is selected, populate the city field and fetch the cities belonging to the selected province
        // $contact['city_id'] need to be set to actual city_id
        if (!is_null($contact->city_id)) {
            $contact->city_id = $contact->city_id;
            // Assuming $cityId is provided
            $contact['addressDetail'] = $apiRajaOngkirService->getCityById($contact->city_id);
        }

        // Using the retrieved contact data, we pass it to the views
        View::composer(['components.frontend.footer', 'components.frontend.top-header'], function ($view) use ($contact) {
            $view->with('contact', $contact);
        });

        // This part is to share the contact data with the entire application.
        app()->singleton('contactData', function () use ($contact) {
            return $contact;
        });

        // Here we set the default locale of our application to 'id' (Indonesian).
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');

        // By default Laravel uses a character limit of 255 for database fields.
        Schema::defaultStringLength(200);
    }

}
