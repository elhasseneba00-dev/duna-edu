<?php

use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\CarriereController as ApiCarriereController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\FormController;
use App\Http\Controllers\Api\InstructorController;
use App\Http\Controllers\Api\SiteController;
use App\Http\Controllers\Api\TestimonieController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('/forms/newsletter', [FormController::class, 'newsletter']);
    Route::post('/forms/contact', [FormController::class, 'contact']);
    Route::post('/forms/devis', [FormController::class, 'devis']);
    Route::post('/forms/candidature', [FormController::class, 'candidature']);

    Route::get('/site', [SiteController::class, 'show']);
    Route::get('/about', [AboutController::class, 'show']);
    Route::get('/courses', [CourseController::class, 'index']);
    Route::get('/courses/{slug}', [CourseController::class, 'show']);
    Route::get('/categories', [CourseController::class, 'categories']);
    Route::get('/tags', [CourseController::class, 'tags']);
    Route::get('/instructors', [InstructorController::class, 'index']);
    Route::get('/instructors/{id}', [InstructorController::class, 'show']);

    // Careers
    Route::get('/careers', [ApiCarriereController::class, 'index']);
    Route::get('/careers/{slug}', [ApiCarriereController::class, 'show']);

    // Testimonials
    Route::get('/testimonies', [TestimonieController::class, 'index']);
});
