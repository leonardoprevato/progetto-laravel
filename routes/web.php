<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DrugsController;
use App\Http\Controllers\ActiveIngredientsController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('company2', [CompanyController::class,'getcompany2']);
Route::get('company2/{id}', [CompanyController::class,'fetchcompany2']);
Route::get('drugs', [DrugsController::class,'getdrugs']);
Route::get('drugs/{id}', [DrugsController::class,'fetchdrugs']);
Route::get('activeingredients', [ActiveIngredientsController::class,'getdrugs']);
Route::get('activeIngredients/{id}', [ActiveIngredientsController::class,'fetchdrugs']);


Route::resource('company',CompanyController::class);    

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
