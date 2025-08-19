<?php

use App\Http\Controllers\AssuranceController;
use App\Http\Controllers\CaisseController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\SalaireController;
use App\Http\Controllers\SortieController;
use App\Http\Controllers\TypeEntreeController;
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
        'employes' => EmployeController::class,
        'assurances' => \App\Http\Controllers\AssuranceController::class,
        'salaires' => \App\Http\Controllers\SalaireController::class,
        'typeEntrees' => \App\Http\Controllers\TypeEntreeController::class,
    ]);

    Route::get('/rapports',[RapportController::class,'index'])->name('rapports.index');
    Route::get('/rapports/general', [RapportController::class, 'rapportGeneral'])->name('rapports.general');
    Route::post('/rapports/generer', [RapportController::class, 'genererRapport'])->name('rapports.generer');

    Route::get('/api/depenses', [RapportController::class, 'getDepensesJson'])->name('rapports.getDepensesJson');
    Route::get('/api/salaires', [RapportController::class, 'getSalairesJson'])->name('rapports.getSalairesJson');
    Route::get('cotisations', [SalaireController::class, 'getCotisations'])->name('assurances.getCotisations');
    Route::get('/api/types-sorties/{id}', [TypeSortieController::class, 'getTypeSorties'])->name('typesSorties.getTypeSorties');
    Route::get('/api/types-entrees', [TypeEntreeController::class, 'getTypeEntrees'])->name('typesEntrees.getTypeEntrees');
    Route::get('/salaire/{token}/print', [SalaireController::class, 'print'])->name('salaires.print');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
