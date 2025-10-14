<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\TourPackageController;
use App\Http\Controllers\ActivityPackageController;
use App\Http\Controllers\RentalPackageController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ItineraryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReviewController;

Route::apiResource('tours', TourPackageController::class);
Route::apiResource('activities', ActivityPackageController::class);
Route::apiResource('rentals', RentalPackageController::class);
Route::apiResource('destinations', DestinationController::class);
Route::apiResource('itineraries', ItineraryController::class);
Route::apiResource('bookings', BookingController::class);
Route::apiResource('reviews', ReviewController::class);
Route::apiResource('payments', PaymentController::class);
Route::apiResource('drivers', DriverController::class);