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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/tasks', '\App\Http\Controllers\TaskController@index')->middleware(['auth'])->name('tasks');
Route::post('/task', '\App\Http\Controllers\TaskController@store')->middleware(['auth']);
Route::put('/task/{task}', '\App\Http\Controllers\TaskController@markDone')->middleware(['auth']);
Route::delete('/task/{task}', '\App\Http\Controllers\TaskController@destroy')->middleware(['auth']);
require __DIR__ . '/auth.php';
