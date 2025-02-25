<?php

use App\Http\Controllers\CaisseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SortieController;
use App\Http\Controllers\TypeSortieController;
use App\Http\Controllers\UniteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});
Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('welcome');
    })->name('home');
    Route::resources([
        'unites' => UniteController::class,
        'caisses' => CaisseController::class,
        'typeSorties' => TypeSortieController::class,
        'sorties' => SortieController::class,
        'users' => UserController::class,
    ]);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
