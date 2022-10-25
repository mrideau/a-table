<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\RecipeController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\ContactController;

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

Route::get('/', [HomeController::class, 'show'])->name('home');

Route::get('/conditions-utilisation', function() {
    return view('terms');
})->name('terms');

Route::get('/mentions-legales', function() {
    return view('legals');
})->name('legals');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'contact'])->name('contact');

Route::resource('/recettes', RecipeController::class)->names('recipes');
Route::resource('/categories', CategoryController::class)->names('categories');

Route::get('/connexion', [LoginController::class, 'show'])->name('auth.login');
Route::post('/connexion', [LoginController::class, 'login'])->name('auth.login');
Route::get('/deconnexion', [LoginController::class, 'logout'])->name('auth.logout');
