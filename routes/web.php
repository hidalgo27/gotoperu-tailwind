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
Route::get('/peru-travel-packages', [HomeController::class, 'packages'])->name('packages.all');
Route::get('/peru-travel-packages/{url}', [HomeController::class, 'packages_detail'])->name('packages.detail');

Route::get('/destinations', [HomeController::class, 'destinations'])->name('destinations.all');
Route::get('/destinations/{destinations}', [HomeController::class, 'destinations_show'])->name('destinations.show');

Route::get('/about-us', [HomeController::class, 'about'])->name('about');
Route::get('/why-book-with-us', [HomeController::class, 'book'])->name('book');
Route::get('/travel-with-confidence', [HomeController::class, 'confidence'])->name('confidence');
Route::get('/booking-terms-and-conditions', [HomeController::class, 'conditions'])->name('conditions');
Route::get('/frequently-asked-questions', [HomeController::class, 'faq'])->name('faq');

Route::get('/hotels', [HomeController::class, 'hotels'])->name('hotels');
Route::get('/social-responsability', [HomeController::class, 'responsability'])->name('responsability');
Route::get('/reviews', [HomeController::class, 'reviews'])->name('reviews');
Route::get('/peru-tours', [HomeController::class, 'tours'])->name('tours');

Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blog/{post}', [HomeController::class, 'blog_show'])->name('blog.show');

//form inquire
Route::post('/formulario-diseno', [FormpageController::class, 'formulario_diseno'])->name('formulario_diseno');
