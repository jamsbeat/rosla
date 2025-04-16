<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Livewire\AdminPage;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/consultations', App\Livewire\ConsultationBooking::class)->name('consultations');
    Route::get('/profile', App\Livewire\ProfilePage::class)->name('profile');

    Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');
});

Route::get('/carbon-calculator', App\Livewire\CarbonCalculator::class)->name('carbon-calculator');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin', AdminPage::class)->name('admin');
});


Route::get('/about', function () {
    return view('about');
})->name('about');
