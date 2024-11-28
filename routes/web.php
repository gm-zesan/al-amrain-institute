<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/password-change', [DashboardController::class, 'changePassword'])->name('password-change.profile');
    Route::patch('/profile', [ProfileController::class, 'myProfileUpdate'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');




    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/dashboard/cache-clear', [DashboardController::class,'cacheClear'])->name('cache-clear');
    

    Route::get('/dashboard/our-team', [OurTeamController::class,'index'])->name('our-teams');
    Route::get('/dashboard/our-team/create', [OurTeamController::class,'create'])->name('our-team.create');
    Route::post('/dashboard/our-team/store', [OurTeamController::class,'store'])->name('our-team.store');
    Route::get('/dashboard/our-team/edit/{id}', [OurTeamController::class,'edit'])->name('our-team.edit');
    Route::post('/dashboard/our-team/update/{id}', [OurTeamController::class,'update'])->name('our-team.update');
    Route::get('/dashboard/our-team/delete/{id}', [OurTeamController::class,'delete'])->name('our-team.delete');
});

require __DIR__.'/auth.php';
