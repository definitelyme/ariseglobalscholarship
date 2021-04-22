<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PreferenceController;
use App\Http\Controllers\ScholarshipController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [HomeController::class, "index"])->name('/');

Route::get('/dashboard', [ScholarshipController::class, 'index'])
    ->middleware(['auth', 'verified', 'applicant'])
    ->name('dashboard');

require __DIR__ . '/auth.php';

Route::prefix("/scholarship/get-started")->group(function () {
    Route::get('/apply', [ScholarshipController::class, 'create'])
        ->name("scholarship.apply")
        ->middleware(['auth', 'applicant']);
});

Route::middleware(['auth', 'verified'])->name("scholarship.")->prefix("scholarship/{program}")->group(function () {
    Route::get('/', [ScholarshipController::class, 'index'])
        ->name("/");

    Route::get('/applications', [ScholarshipController::class, 'index'])
        ->name("index");

    Route::post('/application/store', [ScholarshipController::class, 'store'])
        ->name("store");

    Route::get('/user/{user}/application', [ScholarshipController::class, 'show'])
        ->name("show");

    Route::get('/user/{user}/application/edit', [ScholarshipController::class, 'edit'])
        ->name("edit");

    Route::put('/user/{user}/application', [ScholarshipController::class, 'update'])
        ->name("update");

    Route::delete('/user/{user}/application', [ScholarshipController::class, 'delete'])
        ->name("delete");

    Route::delete('/user/{user}/application/destroy', [ScholarshipController::class, 'destroy'])
        ->name("destroy");

    Route::get('/about', [ScholarshipController::class, 'about'])
        ->name("about");
});

Route::prefix("/support")->group(function () {
    Route::get('/', function () {
        return redirect()->route('/');
    });

    Route::get('/contact', [PreferenceController::class, 'contactForm'])->name("contact");

    Route::post('/contact', [PreferenceController::class, 'sendEmail'])->name("contact.store");

    Route::post('/newsletter/subscription', [PreferenceController::class, ' '])->name("subscribe");

    Route::get('/about-us', [PreferenceController::class, 'about'])->name("about");

    Route::get('/faq', [PreferenceController::class, 'faq'])->name("faq");
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
