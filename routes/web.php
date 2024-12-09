<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sampleController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[sampleController::class,'index'])->name('samples.index');
Route::get('/samples/create', [SampleController::class, 'create'])->name('samples.create');
Route::post('/samples', [SampleController::class, 'store'])->name('samples.store');
Route::get('/samples/{id}/edit', [SampleController::class, 'edit'])->name('samples.edit');
Route::put('/samples/{id}', [SampleController::class, 'update'])->name('samples.update');
Route::delete('/samples/{id}', [SampleController::class, 'destroy'])->name('samples.destroy');
