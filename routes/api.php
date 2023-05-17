<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClickController;



Route::get('/click/{click_number}', [ClickController::class, 'generateClick'])->name('click.generate');
