<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\LandingPageController;
use App\Http\Controllers\Landing\ContactsPageController;
use App\Http\Controllers\Landing\ServicePageController;
use App\Http\Controllers\Landing\WorksGalleryPageController;
use App\Http\Controllers\Landing\RequestFormController;
use App\Http\Controllers\SeoController;

Route::get('/', LandingPageController::class)->name('landing.home');
Route::get('/contacts', ContactsPageController::class)->name('landing.contacts');
Route::get('/works-gallery', WorksGalleryPageController::class)->name('landing.gallery');
Route::get('/services/{slug}', ServicePageController::class)->name('landing.services.show');
Route::post('/request', RequestFormController::class)->name('landing.request.send');
Route::get('/sitemap.xml', [SeoController::class, 'sitemap'])->name('seo.sitemap');
Route::get('/robots.txt', [SeoController::class, 'robots'])->name('seo.robots');
