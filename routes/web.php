<?php

use App\Enums\Language;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\TourController;
use App\Http\Controllers\Web\MyTourController;
use App\Http\Controllers\Web\ProfileController;
use App\Http\Controllers\Web\PageController;
use App\Http\Controllers\Web\Auth\LoginController;
use App\Http\Controllers\Web\Auth\RegisterController;
use App\Http\Controllers\Web\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('locale/{lang}', function ($lang) {
    if (Language::tryFrom($lang)) {
        session(['locale' => $lang]);
    }
    return back();
})->name('locale.switch');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/licenses', [PageController::class, 'licenses'])->name('licenses');

Route::get('/tours', [TourController::class, 'index'])->name('tours.index');
Route::get('/tours/{tourPackage:slug}', [TourController::class, 'show'])->name('tours.show');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

    Route::get('/my-tours', [MyTourController::class, 'index'])->name('my-tours.index');
    Route::get('/my-tours/create', [MyTourController::class, 'create'])->name('my-tours.create');
    Route::post('/my-tours', [MyTourController::class, 'store'])->name('my-tours.store');
    Route::get('/my-tours/{myTour}', [MyTourController::class, 'show'])->name('my-tours.show');
    Route::get('/my-tours/{myTour}/edit', [MyTourController::class, 'edit'])->name('my-tours.edit');
    Route::put('/my-tours/{myTour}', [MyTourController::class, 'update'])->name('my-tours.update');
    Route::delete('/my-tours/{myTour}', [MyTourController::class, 'destroy'])->name('my-tours.destroy');

    Route::post('/tours/{tourPackage}/book', [BookingController::class, 'store'])->name('bookings.store');
});