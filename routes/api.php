<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\FormpageController;
use App\Http\Controllers\API\HomeSliderController;
use App\Http\Controllers\API\PackagesController;
use App\Http\Controllers\API\TestimonialController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('destinos', [FormpageController::class, 'destinos'])->name('api.destinos');
Route::get('categorias', [FormpageController::class, 'categorias'])->name('api.categorias');

Route::get('testimonial', [TestimonialController::class, 'testimonial'])->name('api.testimonial');
Route::get('category', [CategoryController::class, 'category'])->name('api.category');

Route::get('slider_home_featured', [HomeSliderController::class, 'slider_home_featured'])->name('api.slider_home_featured');
Route::get('slider_home_recommended', [HomeSliderController::class, 'slider_home_recommended'])->name('api.slider_home_recommended');

//Route::get('packages', [PackagesController::class, 'packages'])->name('api.packages');
//Route::get('packages/{url}', [PackagesController::class, 'packages_detail'])->name('api.packages.detail');
//Route::get('packages/itinerary/{url}', [PackagesController::class, 'itinerary'])->name('api.packages.itinerary');

//Route::get('packages/destinations/{destino}', [PackagesController::class, 'destinos_show'])->name('api.destination.show');


