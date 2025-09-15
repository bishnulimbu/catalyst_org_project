<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ObjectiveController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomePageController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('/member', MemberController::class);
});

Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
Route::get('/hero/edit',[HeroController::class,'edit'])->name('hero.edit')->middleware('auth');
Route::put('/hero/update',[HeroController::class, 'update'])->name('hero.update')->middleware('auth');
Route::resource('objectives', ObjectiveController::class)->middleware('auth');


require __DIR__ . '/auth.php';
