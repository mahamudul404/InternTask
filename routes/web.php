<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('welcome');


// multiple images upload
Route::get('/upload-images', [ImageController::class, 'uploadForm'])->name('upload.images')->middleware(['auth', 'verified']);
Route::post('/upload-images', [ImageController::class, 'store'])->name('images.store');


// crud operations using ajax
Route::get('/products', [ProductController::class, 'index'])->name('products.index')->middleware(['auth', 'verified']);

Route::post('/products', [ProductController::class, 'store'])->name('products.store')->middleware(['auth', 'verified']);

Route::post('/product-update', [ProductController::class, 'update'])->name('product.update')->middleware(['auth', 'verified']);

Route::post('/product-delete', [ProductController::class, 'destroy'])->name('product.delete')->middleware(['auth', 'verified']);





require __DIR__ . '/auth.php';
