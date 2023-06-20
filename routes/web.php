<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
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
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::group(['prefix'=>'projects','as'=>'projects.'], function(){
    Route::get('/', [ProjectController::class, 'index'])->name('index');
    Route::get('/create', [ProjectController::class, 'create'])->middleware('auth')->name('create');
    Route::get('/indexForEdit', [ProjectController::class, 'indexForEdit'])->middleware('auth')->name('indexForEdit');
    Route::post('/store',[ProjectController::class, 'store'])->name(('store'));
    Route::get('/{project}', [ProjectController::class, 'show'])->name('show');
});


require __DIR__.'/auth.php';
