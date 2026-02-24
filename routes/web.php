<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

//Frontend View Management------------------------------------------------------------------------------>
Route::get('/',[FrontendController::class, 'index'] )->name('Home');
Route::get('/contact',[FrontendController::class, 'contact'])->name('Contact');
Route::post('/contact',[FrontendController::class, 'contact_submitted'])->name('Contact Submitted');
Route::get('/search', [FrontendController::class, 'myquery'])->name('Search Result');
Route::get('/product/{id}', [FrontendController::class, 'product_details'])->name('Single Product');
Route::post('/newsletter', [FrontendController::class, 'newsletter'])->name('Newsletter');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [BackendController::class, 'dashboard'])->name('dashboard');

    Route::prefix('auth')->group(function () {
        Route::resource('categories', CategoryController::class)->except(['create','edit','show']);
        Route::resource('products', ProductController::class)->except(['create','edit','show']);
        Route::resource('orders', OrderController::class);
    });
});
