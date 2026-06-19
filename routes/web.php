<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Permission Routes
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::get('/permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::post('/permissions/{id}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::delete('/permissions/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy');
    Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');


    // Role Routes
    Route::get('/roles/create',[RoleController::class,'create'])->name('roles.create');
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

    // User Routes
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/{id}', [UserController::class, 'update'])->name('users.update');
    // Route::get('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');

    // Teacher Routes
    Route::get('/dashboard/teachers',[TeacherController::class ,'dashboard'])->name('dashboard.teacher');
    

    // Event Routes
    Route::get('/event',[EventController::class, 'index'])->name('events.index');
    Route::get('/event/create',[EventController::class, 'create'])->name('events.create');
    Route::post('/event/create',[EventController::class, 'store'])->name('events.store');
    Route::get('/event/{id}/edit',[EventController::class, 'edit'])->name('events.edit');
    Route::post('/event/{id}/edit',[EventController::class, 'update'])->name('events.update');
    Route::get('/event/{id}/delete',[EventController::class, 'destroy'])->name('events.delete');

});

require __DIR__.'/auth.php';
