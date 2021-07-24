<?php

use App\Http\Controllers\API\FormpageController;
use App\Http\Controllers\Page\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

///*Route::get('/', function () {
//    return view('welcome');
//});*/

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/peru-travel-packages', [HomeController::class, 'packages'])->name('packages');
Route::get('/peru-travel-packages/{url}', [HomeController::class, 'packages_detail'])->name('packages.detail');

Route::get('/destinations', [HomeController::class, 'destinations'])->name('destinations');
Route::get('/destinations/{destinations}', [HomeController::class, 'destinations_show'])->name('destinations.show');

//Route::get('destinations/{destination}', function (){
//    return "Squi sera la info";
//})->name('destinations.show');



//form inquire
Route::post('/formulario-diseno', [FormpageController::class, 'formulario_diseno'])->name('formulario_diseno');
