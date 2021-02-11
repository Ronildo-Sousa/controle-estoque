<?php

use App\Http\Controllers\DashboardController;
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
    return view('welcome');
});

Route::middleware(['auth'])->group(function (){
    Route::name('admin.')->group(function(){

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
        Route::get('/produto/novo', [DashboardController::class, 'create'])->name('create');
        Route::post('/produto/novo', [DashboardController::class, 'store'])->name('store');
        Route::post('/produto/edicao', [DashboardController::class, 'edit'])->name('edit');
        Route::put('/produto/edicao', [DashboardController::class, 'update'])->name('update');
        Route::delete('/produto/exclusao', [DashboardController::class, 'destroy'])->name('destroy');
        
        Route::get('/categoria/nova', [DashboardController::class, 'createCategory'])->name('createCategory');
        Route::post('/categoria/nova', [DashboardController::class, 'storeCategory'])->name('storeCategory');
        Route::post('/categoria/busca', [DashboardController::class, 'searchCategory'])->name('searchCategory');

    });
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
