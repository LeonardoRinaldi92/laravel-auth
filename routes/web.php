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
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
});



Route::group(['prefix'=>'admin/projects','as'=>'admin.projects.','middleware'=>'auth'], function(){
    Route::get('/create', [ProjectController::class, 'create'])->name('create');
    Route::get('/indexForEdit', [ProjectController::class, 'indexForEdit'])->name('indexForEdit');
    Route::post('/store',[ProjectController::class, 'store'])->name(('store'));
    Route::get('/{project}/edit', [ProjectController::class, 'edit'])->name('edit');
    Route::put('/{project}/update', [ProjectController::class, 'update'])->name('update');
});

Route::group(['prefix'=>'projects','as'=>'projects.'], function(){
    Route::get('/', [ProjectController::class, 'index'])->name('index');
    Route::get('/{project}', [ProjectController::class, 'show'])->name('show');
});

require __DIR__.'/auth.php';
