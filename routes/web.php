<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about-us', [PageController::class, 'about'])->name('about');
Route::get('/our-work', [PageController::class, 'ourWork'])->name('our-work');
Route::get('/leadership', [PageController::class, 'leadership'])->name('leadership');
Route::get('/partnership', [PageController::class, 'partnership'])->name('partnership');
Route::get('/volunteer', [PageController::class, 'volunteer'])->name('volunteer');

Route::post('/volunteer', [ContactController::class, 'volunteer'])->name('volunteer.submit');
Route::post('/partnership', [ContactController::class, 'partnership'])->name('partnership.submit');

Route::get('/donate', [DonationController::class, 'show'])->name('donate');
Route::post('/donate/checkout', [DonationController::class, 'checkout'])->name('donate.checkout');
Route::get('/donate/success', [DonationController::class, 'success'])->name('donate.success');
Route::get('/donate/cancel', [DonationController::class, 'cancel'])->name('donate.cancel');

Route::post('/stripe/webhook', [DonationController::class, 'webhook'])->name('stripe.webhook');
