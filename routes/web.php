<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DrugsController;
use App\Http\Controllers\ActiveIngredientController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('drugs', [DrugsController::class,'getdrugs']);
Route::get('drugs/{id}', [DrugsController::class,'fetchdrugs']);
Route::get('activeingredients', [ActiveIngredientController::class,'getdrugs']);
Route::get('activeingredients/{id}', [ActiveIngredientController::class,'fetchingredients']);
Route::get('activeingredients/{id}/drugs', [ActiveIngredientController::class,'fetchDrugsByIngredient']);
Route::get('company/{id}/drugs', [CompanyController::class,'fetchDrugsByCompany']);

Route::resource('company',CompanyController::class)->only(['create','store','update','destroy'])->middleware(['index','show']);
Route::resource('company',CompanyController::class)->only(['index','show']);


Route::resource('company',CompanyController::class);    

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
