<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'jobsindex'])->name('home');
Route::get('/jobs', [HomeController::class, 'jobsindex'])->name('jobs.show');

Route::get('/dashboard', [UserController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');





});
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users'); // Name: admin.users
    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications');
    Route::get('/applications/{id}', action: [ApplicationController::class, 'destroy'])->name('applications.destroy');


    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit'); // Name: admin.users.edit
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update'); // Name: admin.users.update
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy'); // Name: admin.users.destroy

    Route::resource('/jobs', JobController::class);
});


Route::post('/apply/{job}', [ApplicationController::class, 'store'])->name('jobs.apply');
Route::get('/job/detail/{id}', [HomeController::class, 'jobDtails'])->name('job.detail');

require __DIR__.'/auth.php';
