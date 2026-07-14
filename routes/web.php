<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Auth::routes();

Route::get('/register/success', [App\Http\Controllers\Auth\RegisterController::class, 'showSuccess'])->name('register.success');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/category/{category}', function ($category) {
    return view('category', ['category' => $category]);
})->name('category');

Route::get('/property/{id}', function ($id) {
    return view('property', ['id' => $id]);
})->name('property.show');
