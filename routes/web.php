<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');

Route::get('/recetas', [App\Http\Controllers\RecetaController::class, 'index'])
->name('recetas');

Route::get('/recetas/create', [App\Http\Controllers\RecetaController::class, 'create'])
->name('recetas.create');

Route::post('/recetas', [App\Http\Controllers\RecetaController::class, 'store'])
->name('recetas.store');

Route::get('/recetas/{receta}', [App\Http\Controllers\RecetaController::class, 'show'])
->name('recetas.show');

Route::get('/recetas/{receta}/edit', [App\Http\Controllers\RecetaController::class, 'edit'])
->name('recetas.edit');

Route::put('/recetas/{receta}', [App\Http\Controllers\RecetaController::class, 'update'])
->name('recetas.update');

Route::delete('/recetas/{receta}', [App\Http\Controllers\RecetaController::class, 'destroy'])
->name('recetas.delete');