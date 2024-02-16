<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('tasks.index');
});

Route::prefix('/tasks')->name('tasks.')->group(static function () {
    Route::get('/', [TaskController::class, 'index'])->name('index');
    Route::get('/create', [TaskController::class, 'create'])->name('create');
    Route::get('/{id}/edit', [TaskController::class, 'edit'])->name('edit');
    Route::get('/{id}', [TaskController::class, 'show'])->name('show');
    Route::post('/', [TaskController::class, 'store'])->name('store');
    Route::put('/{id}', [TaskController::class, 'update'])->name('update');
    Route::post('/{id}', [TaskController::class, 'delete'])->name('delete');
    Route::put('/{id}/toogle', [TaskController::class, 'complete'])->name('complete');
});

Route::fallback(function () {
    return 'Still got somewhere!';
});
