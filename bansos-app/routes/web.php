<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenerimaBansosController;

Route::get('/bansos', [PenerimaBansosController::class, 'index']);
Route::get('/preview', [PenerimaBansosController::class, 'preview'])->name('form.preview');
Route::post('/store', [PenerimaBansosController::class, 'store'])->name('form.store');
