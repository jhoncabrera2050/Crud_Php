<?php
use App\Http\Controllers\PersonasController;
use Illuminate\Support\Facades\Route;



Route::get('/', [PersonasController::class, 'index'])-> name('persona.index');
Route::get('/create', [PersonasController::class, 'create'])-> name('persona.create');
Route::post('/store', [PersonasController::class, 'store'])->name('persona.store');
Route::delete('/destroy/{id}', [PersonasController::class, 'destroy'])->name('persona.destroy');
Route::get('/edit/{id}/edit',[PersonasController::class,'edit'])->name('persona.edit');
Route::put('/update/{id}',[PersonasController::class,'update'])->name('persona.update');
