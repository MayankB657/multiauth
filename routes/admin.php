<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\{AuthenticatedSessionController, PasswordResetLinkController, NewPasswordController, EmailVerificationPromptController, VerifyEmailController, EmailVerificationNotificationController, ConfirmablePasswordController};
use App\Http\Controllers\Admin\HomeController;

date_default_timezone_set('Asia/Kolkata');

Route::prefix('admin')->group(static function () {
    Route::middleware('guest:admin')->group(static function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('admin.login');
        Route::post('login', [AuthenticatedSessionController::class, 'store']);
        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('admin.password.request');
        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('admin.password.email');
        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('admin.password.reset');
        Route::post('reset-password', [NewPasswordController::class, 'store'])->name('admin.password.update');
    });

    Route::middleware(['auth:admin'])->group(static function () {
        Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('admin.verification.notice');
        Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('admin.verification.verify');
        Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('admin.verification.send');
    });

    Route::middleware(['auth:admin', 'verified'])->group(static function () {
        Route::name('admin.')->group(static function () {
            Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
            Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
            Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
            Route::get('/', [HomeController::class, 'index'])->name('index');
            Route::get('profile', [HomeController::class, 'profile'])->middleware('password.confirm.admin')->name('profile');
            Route::patch('profile', [HomeController::class, 'update'])->name('profile.update');
            Route::patch('profile-email-change', [HomeController::class, 'updateEmail'])->name('profile.update-email');
            Route::patch('profile-password-change', [HomeController::class, 'updatePassword'])->name('profile.update-password');
            Route::patch('delete-account', [HomeController::class, 'deleteAccount'])->name('deleteAccount');
        });
    });
});
