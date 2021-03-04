<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'quote' => "Keep Learning..",
        'settings' => json_encode([
            'show_quote' => true,
            'phone' => '+2348100395180',
            'phone_styled' => '+234 810 039 5180',
            'email' => 'ejike.br@gmail.com',
            'address' => '34 Congress Road',
            'address_name' => '34 Congress Road'
        ]),
        // 'laravelVersion' => Application::VERSION,
        // 'phpVersion' => PHP_VERSION,
    ]);
})->name('/');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'verified'])->name("scholarship.")->prefix("student")->group(function () {
    Route::get('/v1/scholarship/about', function () {
        return 'Hello home scholarship';
    })->name("about");

    Route::get('/apply', function () {
        return 'Hello home apply scholarship';
    })->name("/");

    Route::post('/application/store', function () {
        return 'Hello home apply scholarship';
    })->name("store");

    Route::get('/{user}/application', function () {
        return 'Hello home apply scholarship';
    })->name("show");

    Route::get('/{user}/application/edit', function () {
        return 'Hello home apply scholarship';
    })->name("edit");

    Route::put('/{user}/application', function () {
        return 'Hello home apply scholarship';
    })->name("update");

    Route::delete('/{user}/application', function () {
        return 'Hello home apply scholarship';
    })->name("delete");

    Route::delete('/{user}/application/destroy', function () {
        return 'Hello home apply scholarship';
    })->name("destroy");
});

Route::prefix("/g/v1")->group(function () {
    Route::get('/contact', function () {
        return 'Hello home apply scholarship';
    })->name("contact");

    Route::post('/contact', function () {
        return 'Hello home apply scholarship';
    })->name("contact.store");

    Route::get('/newsletter/subscription', function () {
        return 'Hello home apply scholarship';
    })->name("subscribe");

    Route::get('/about-us', function () {
        return 'Hello home apply scholarship';
    })->name("about");
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
