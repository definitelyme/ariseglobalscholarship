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
            'settings' => [
                'show_quote' => true,
                'phone' => setting('site.phone'),
                'phone_styled' => setting('site.phone_styled'),
                'email' => setting('site.email'),
                'address' => setting('site.address'),
                'address_url' => setting('site.address_url'),
                'description' => setting('site.description'),
                'home_about' => setting('site.home_about'),
            ],
        ]);
    }
}
