<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\HomeController;
Route::get('/.', function () {
    return view('welcome');
});

Route::get('/..', function () {
    return view('index'); // hii ni resources/views/index.blade.php
})->name('home');
Route::get('products/image/{filename}', function ($filename) {
    $path = storage_path('app/private/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
})->name('product.image.private');
//Route::get('/dashboard', function () {
  //  return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/y', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//require __DIR__.'/auth.php';

Auth::routes();

Route::get('/,home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
use App\Models\Product;

// Homepage


Route::get('products/image/{filename}', [ProductController::class, 'showImage'])->name('product.image.private');


Route::get('/', function () {
    $products = Product::latest()->get();
    return view('index', compact('products'));
})->name('home');

// Fix dashboard redirect
Route::get('/dashboard', function () {
    return redirect()->route('home');
})->name('dashboard');

Route::get('/products/image/{filename}', function ($filename) {
    if (!auth()->check()) {
        abort(403);
    }

    $path = storage_path('app/private/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
})->name('product.image.private');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
