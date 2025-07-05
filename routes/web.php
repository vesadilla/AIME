<?php

use App\Http\Controllers\ImageClassificationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/', [ImageClassificationController::class, 'index'])->name('landing');
Route::post('/', [ImageClassificationController::class, 'classify'])->name('classify');

