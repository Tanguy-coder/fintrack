<?php

use App\Http\Controllers\CaisseController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\SortieController;
use App\Http\Controllers\TypeSortieController;
use App\Http\Controllers\UniteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});
Route::middleware('auth')->group(function () {
    Route::get('/home', [MainController::class,'index'])->name('home');
    Route::resources([
        'unites' => UniteController::class,
        'caisses' => CaisseController::class,
        'typeSorties' => TypeSortieController::class,
        'sorties' => SortieController::class,
        'users' => UserController::class,
    ]);

    Route::get('/rapports',[RapportController::class,'index'])->name('rapports.index');
    Route::get('/api/depenses', [RapportController::class, 'getDepensesJson'])->name('rapports.getDepensesJson');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
