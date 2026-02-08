<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/', [ItemController::class, 'showItem'])->name('showItem');

Route::post('/create', [ItemController::class, 'create'])->name('create');
Route::get('/create', [ItemController::class, 'showCreate'])->name('showCreate');

Route::get('/update/{id}', [ItemController::class, 'showUpdate'])->name('showUpdate');
Route::patch('/update/{id}',[ItemController::class, 'update'])->name('update');

Route::delete('/delete/{id}', [ItemController::class, 'delete'])->name('delete');