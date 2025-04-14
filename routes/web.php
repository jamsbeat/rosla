<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/carbon-calculator', App\Livewire\CarbonCalculator::class)->name('carbon-calculator');
Route::get('/consultations', App\Livewire\ConsultationBooking::class)->name('consultations');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});

Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');


Route::get('/about', function () {
    return view('about');
})->name('about');
