<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CKEditorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('backend.layout.home');
});

Route::prefix('blog')->group(function () {
    Route::get('/',[BlogController::class,'index'])->name('blog.index');
    Route::get('/create',[BlogController::class,'create'])->name('blog.create');
    Route::post('/create',[BlogController::class,'store'])->name('blog.store');
    Route::get('/{id}/edit',[BlogController::class,'edit'])->name('blog.edit');
    Route::post('/{id}/edit',[BlogController::class,'update'])->name('blog.update');
    Route::get('/{id}/delete',[BlogController::class,'delete'])->name('blog.delete');
    Route::post('/{id}/delete',[BlogController::class,'destroy'])->name('blog.destroy');
    Route::get('/{id}/detail',[BlogController::class,'detail'])->name('blog.detail');
    Route::get('/search',[BlogController::class,'search'])->name('blog.search');
    Route::get('/filter',[BlogController::class,'filterByCategory'])->name('blog.filter');
});

Route::prefix('category')->group(function () {
    Route::get('/',[CategoryController::class,'index'])->name('category.index');
    // Route::get('/create',[BlogController::class,'create'])->name('blog.create');
    // Route::post('/create',[BlogController::class,'store'])->name('blog.store');
    // Route::get('/{id}/edit',[BlogController::class,'edit'])->name('blog.edit');
    // Route::post('/{id}/edit',[BlogController::class,'update'])->name('blog.update');
    // Route::get('/{id}/delete',[BlogController::class,'delete'])->name('blog.delete');
    // Route::post('/{id}/delete',[BlogController::class,'destroy'])->name('blog.destroy');
});
