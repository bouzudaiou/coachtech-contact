<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminContactController;

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

Route::get('/', [ContactController::class, 'index']);
Route::post('/contact/confirm', [ContactController::class, 'confirm']);
Route::post('/contact/thanks', [ContactController::class, 'thanks']);
Route::post('/contact/edit', [ContactController::class, 'edit']);
Route::middleware('auth')->group(function () {
    Route::get('/admin/contacts', [AdminContactController::class, 'index']);
    Route::get('/admin/contacts/{id}', [AdminContactController::class, 'show']);
    Route::patch('/admin/contacts/{id}', [AdminContactController::class, 'update']);
    Route::delete('/admin/contacts/{id}', [AdminContactController::class, 'destroy']);
});