<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\MainController::class,"home"])->name("home");
Route::get('/about', [App\Http\Controllers\MainController::class,"about"])->name("about");


Route::get('/information/{id}', [App\Http\Controllers\PostController::class,"showpost"] )->name("information");
Route::post('/newpost', [App\Http\Controllers\PostController::class,"savepost"] )->middleware("auth")->name("newpost");
Route::post('/deletepost', [App\Http\Controllers\PostController::class,"deletepost"] )->middleware("auth")->name("deletepost");
Route::post('/getposts', [App\Http\Controllers\PostController::class,"getposts"] )->middleware("auth")->name("getposts");

Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/english', [App\Http\Controllers\LanguageController::class,"english"])->name('english');
Route::get('/arabic', [App\Http\Controllers\LanguageController::class,"arabic"])->name('arabic');
Route::get('/kurdish', [App\Http\Controllers\LanguageController::class,"kurdish"])->name('kurdish');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
