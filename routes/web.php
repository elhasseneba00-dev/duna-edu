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
use \App\Http\Controllers\ServiceController;
use \App\Http\Controllers\CarriereController;
use \App\Http\Controllers\ContactController;
use \App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;


Route::get('/societe', [SocieteController::class, 'edit'])->name('societe.edit');
Route::put('/societe/{societe}', [SocieteController::class, 'update'])->name('societe.update');

Route::resource('telephones', TelephoneController::class);
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



//Elhassen routes
// Navigation principale
Route::get('/', [WebController::class, 'index'])->name('home.index');
Route::get('/fr', [WebController::class, 'index_fr'])->name('home.index_fr');
Route::get('/about/fr', [WebController::class, 'about_fr'])->name('about.index_fr');

// Services (Catalogue)
Route::get('/services/fr', [ServiceController::class, 'index_fr'])->name('services.index_fr');
Route::get('/workshops/fr', [ServiceController::class, 'workshops_fr'])->name('workshops.index_fr');
Route::get('/services/fr/{slug_fr}', [ServiceController::class, 'show_fr'])->name('services.show_fr');

// Carrières
Route::get('/carriere/fr', [CarriereController::class, 'index_fr'])->name('careers.index_fr');
Route::get('/carriere/fr/{slug_fr}', [CarriereController::class, 'show_fr'])->name('careers.show_fr');
Route::post('/carriere/fr/{slug_fr}/postuler', [CarriereController::class, 'apply_fr'])->name('careers.apply_fr');
Route::post('/carriere/fr/candidature-spontanee', [CarriereController::class, 'spontaneous_fr'])->name('careers.spontaneous_fr');

// Contact
Route::get('/contact/fr', [ContactController::class, 'index_fr'])->name('contact.index_fr');
Route::post('/contact/fr', [ContactController::class, 'store_fr'])->name('contact.store_fr');

// Blog (Phase B prêt)
Route::get('/blog/fr', [BlogController::class, 'index_fr'])->name('blog.index_fr');
Route::get('/blog/fr/{slug}', [BlogController::class, 'show_fr'])->name('blog.show_fr');

// Visualisation (placeholder Phase A)
Route::get('/visualisation/fr', [WebController::class, 'visualisation_fr'])->name('visualisation.index_fr');
