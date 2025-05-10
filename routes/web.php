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

Route::get('company/{id}/drugs', [CompanyController::class,'fetchDrugsByCompany']);
Route::get('company/{id}/edit', [CompanyController::class,'edit']);
Route::get('active_ingredients/{id}/edit', [ActiveIngredientController::class,'edit']);
Route::get('drug/{id}/edit', [DrugsController::class,'edit']);

Route::resource('company',CompanyController::class)->only(['create','store','update','destroy'])->middleware(['auth']);
Route::resource('company',CompanyController::class)->only(['index','show']);

Route::resource('active_ingredients',ActiveIngredientController::class)->only(['create','store','update','destroy'])->middleware(['auth']);
Route::resource('active_ingredients',ActiveIngredientController::class)->only(['index','show']);

Route::resource('drug',DrugsController::class)->only(['create','store','update','destroy'])->middleware(['auth']);
Route::resource('drug',DrugsController::class)->only(['index','show']);


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
