<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;

Route::get('/', [HomeController::class, 'getHome']);


Route::get('login', function()
{
return view('auth.login');
});

Route::get('logout', function()
{
return 'logout de usuario';
});

Route:: get ('catalog' , [CatalogController::class, 'getIndex']);

Route::get ('catalog/show/{id}', [CatalogController::class, 'getShow']);

Route::get ('catalog/create', [CatalogController::class, 'getCreate']);
Route:: post ('catalog/create', [CatalogController::class, 'postCreate']);

Route::get ('catalog/edit/{id}', [CatalogController::class, 'getEdit']);
Route:: put ('catalog/edit/{id}', [CatalogController::class, 'putEdit']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
