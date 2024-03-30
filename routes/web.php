<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function() {
	Route::resource('note', NoteController::class);

	Route::get('/sorting', [App\Http\Controllers\ArraySortingController::class, 'index'])->name('sorting');
	Route::post('/sorting', [App\Http\Controllers\ArraySortingController::class, 'save'])->name('sorting.get');
});