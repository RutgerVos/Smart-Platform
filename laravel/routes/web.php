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

Route::get('/', function () { return view('home.index'); })->name('Home');
Route::get('/Events', function () { return view('events.index'); })->name('Events');
Route::get('/microcontroller-commands', function () { return view('microcontrollers.userCommands'); })->name('microcontroller-commands');
Route::get('/latestCommand/{robot}', function () { return view('microcontrollers.lastcommand'); })->name('latestCommand');


Route::middleware(['auth'])->group(function () {

});