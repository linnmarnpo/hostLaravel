<?php

use App\Http\Controllers\ActorsController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TvController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MovieController::class, 'index']);
Route::resource('/movies', MovieController::class);
// Route::get('/','MovieController@index')->name('movies.index');
// Route::get('/movies/{movie}','MovieController@show')->name('movies.show');

Route::resource('/actors', ActorsController::class);

Route::get('/actors/page/{page?}', [ActorsController::class, 'index']);

Route::resource('/tv', TvController::class);