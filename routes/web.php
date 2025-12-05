<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/menu', [PageController::class, 'menu'])->name('menu');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/he-thong-cua-hang', [PageController::class, 'stores'])->name('stores');

Route::prefix('gallery')->name('gallery.')->group(function () {
    Route::get('/coffee', [PageController::class, 'galleryCoffee'])->name('coffee');
    Route::get('/food', [PageController::class, 'galleryFood'])->name('food');
});

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/healthy', [PageController::class, 'blogHealthy'])->name('healthy');
    Route::get('/recipe', [PageController::class, 'blogRecipe'])->name('recipe');
});
