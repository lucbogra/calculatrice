<?php

use App\Http\Controllers\CalculatorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('calculator.index'));
});

Route::get('/calculator', [CalculatorController::class, 'index'])->name('calculator.index');

Route::post('/calculator', [CalculatorController::class, 'calculate'])->name('calculator.calculate');
