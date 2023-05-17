<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Client\AddClient;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('clients/index');
})->name('clients');

Route::get('/clients/create', function(){
  return view('clients.add');
})->name('clients.create');

Route::get('/clients/{client}/edit', function ($client) {
    return view('clients.edit', ['clientId' => $client]);
})->name('clients.edit');

Route::delete('/clients/{client}', function ($client) {
})->name('clients.destroy');
