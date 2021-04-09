<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
            ],
            'breadcrumbs' => $request->segments(),
            'settings' => $this->settings($request),
        ]);
    }

    private function settings(Request $request)
    {
        return [
            'show_quote' => true,
            'quote' => 'Keep Learning..',

            'app_name' => setting('site.title'),
            'app_name_short' => setting('site.name_short'),
            'app_initials' => setting('site.initials'),
            'app_url' => setting('site.base_url'),

            'description' => setting('site.description'),
            'description_short' => setting('site.description_short'),

            'phone' => setting('site.phone_number'),
            'phone_styled' => setting('site.phone_styled'),
            'email' => setting('site.email_address'),
            'address' => setting('site.address'),
            'address_url' => setting('site.address_url'),

            'home_about' => setting('site.home_about'),
            'eligibility_1' => setting('site.scholarship_eligibility_1'),
            'eligibility_2' => setting('site.scholarship_eligibility_2'),
            'requirements' => setting('site.scholarship_requirements'),
            'max_passport_size' => setting('site.max_passport_size'),
            'max_upload_size' => setting('site.max_upload_size'),
        ];
    }
}
