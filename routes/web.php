<?php

use App\Http\Controllers\BeneficeController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\InstructeurController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LienUtileController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PropoController;
use App\Http\Controllers\ReseauSocialController;
use App\Http\Controllers\SocieteController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TelephoneController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebController::class, 'index'])->name('home.index');

Route::get('/fr', [WebController::class, 'index_fr'])->name('home.index_fr');
Route::get('/about/fr', [WebController::class, 'about_fr'])->name('about.index_fr');

Route::get('/societe', [SocieteController::class, 'edit'])->name('societe.edit');
Route::put('/societe/{societe}', [SocieteController::class, 'update'])->name('societe.update');

Route::resource('telephones', TelephoneController::class);
Route::resource('emails', EmailController::class);
Route::resource('emails', EmailController::class);
Route::resource('liens_utiles', LienUtileController::class);
Route::resource('reseaux_sociaux', ReseauSocialController::class);
Route::get('/propos', [PropoController::class, 'edit'])->name('propos.edit');
Route::put('/propos/{propos}', [PropoController::class, 'update'])->name('propos.update');
Route::resource('benefices', BeneficeController::class);

Route::resource('categories', CategorieController::class);
Route::resource('tags', TagController::class);
Route::resource('cours', CoursController::class);
Route::resource('modules', ModuleController::class);
Route::resource('lessons', LessonController::class);
Route::resource('instructeurs', InstructeurController::class);
