<?php

use App\Http\Controllers\CesDetailController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactDetailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ObjectiveController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScopeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomePageController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
    Route::get('/hero/edit', [HeroController::class, 'edit'])->name('hero.edit');
    Route::put('/hero/update', [HeroController::class, 'update'])->name('hero.update');
    Route::post('/hero', [HeroController::class, 'store'])->name('hero.store');
    Route::resource('/scopes', ScopeController::class)->middleware('auth');
    Route::resource('objectives', ObjectiveController::class)->middleware('auth');

    Route::get('/ces/form', [CesDetailController::class, 'form'])->name('ces.form');
    Route::get('/ces/{cesDetail}/edit', [CesDetailController::class, 'edit'])->name('ces.edit');
    Route::post('/ces/form', [CesDetailController::class, 'store'])->name('ces.store');
    Route::put('/ces/{cesDetail}', [CesDetailController::class, 'update'])->name('ces.update');

    Route::get('/contact/form', [ContactDetailController::class, 'form'])->name('contact.form');
    Route::post('/contact/form', [ContactDetailController::class, 'store'])->name('contact.store');
    Route::put('/contact/{contactDetail}', [ContactDetailController::class, 'update'])->name('contact.update');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('/member', MemberController::class);
});

require __DIR__.'/auth.php';
