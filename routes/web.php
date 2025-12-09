<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/he-thong-cua-hang', [PageController::class, 'stores'])->name('stores');

Route::prefix('gallery')->name('gallery.')->group(function () {
    Route::get('/', [PageController::class, 'galleryIndex'])->name('index');
});

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/healthy', [PageController::class, 'blogHealthy'])->name('healthy');
    Route::get('/recipe', [PageController::class, 'blogRecipe'])->name('recipe');
});

// API route để lấy chi tiết sản phẩm
Route::get('/api/products/{id}', [PageController::class, 'getProductDetail'])->name('api.product.detail');

// Route alias cho Filament authentication nếu cần
Route::get('/login', function () {
    return redirect()->route('filament.auth.login');
})->name('login');

// Dynamic page route - phải đặt cuối cùng để không conflict với các route khác
Route::get('/{any}', [PageController::class, 'showPage'])->where('any', '.*')->name('page.show');
