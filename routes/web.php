<?php
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('checkout', [PaymentController::class, 'checkout']);
Route::post('/session', [PaymentController::class, 'createSession'])->name('session');

Route::get('/success', function () {
    return "Payment Successful ";
});

Route::get('/cancel', function () {
    return "Payment Cancelled ";
});



