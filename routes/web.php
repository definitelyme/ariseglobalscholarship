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
            'address' => '34 Congress Road'
        ]),
        // 'laravelVersion' => Application::VERSION,
        // 'phpVersion' => PHP_VERSION,
    ]);
})->name('/');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
