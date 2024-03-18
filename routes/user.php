<?php

use App\Http\Controllers\Api\V1\User\ChangeEmailAddressController;
use App\Http\Controllers\Api\V1\User\ChangePasswordController;
use App\Http\Controllers\Api\V1\User\GetEmailNotificationController;
use App\Http\Controllers\Api\V1\User\GetUserReferralCodeController;
use App\Http\Controllers\Api\V1\User\GetUserSavedCourseController;
use App\Http\Controllers\Api\V1\User\GetUserSavedLearningPathController;
use App\Http\Controllers\Api\V1\User\UpdateProfileController;
use App\Http\Controllers\Api\V1\User\UpdateProfileInformationController;
use App\Http\Controllers\Api\V1\User\UpdateUserEmailNotificationPreferencesController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])
    ->prefix('user')
    ->group(function () {

        // ========== Saved Lists ==========
        Route::get('/courses/saved', GetUserSavedCourseController::class);
        Route::get('/learning-paths/saved', GetUserSavedLearningPathController::class);

        // ========== Referral Code ==========
        Route::get('/referral-code', GetUserReferralCodeController::class);

        // ========== Settings ==========
        Route::get('/email-notifications', GetEmailNotificationController::class);
        Route::patch('/notification-preferences/update', UpdateUserEmailNotificationPreferencesController::class)->middleware('verified');
        Route::put('/change-password', ChangePasswordController::class)->middleware('verified');
        Route::put('/change-email', ChangeEmailAddressController::class);
        Route::put('/profile', UpdateProfileController::class)->middleware('verified');
        Route::put('/profile-information', UpdateProfileInformationController::class)->middleware('verified');

    });