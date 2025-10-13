use App\Http\Controllers\TourPackageController;
use App\Http\Controllers\ActivityPackageController;
use App\Http\Controllers\RentalPackageController;

Route::apiResource('tours', TourPackageController::class);
Route::apiResource('activities', ActivityPackageController::class);
Route::apiResource('rentals', RentalPackageController::class);