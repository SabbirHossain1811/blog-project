<?php

use App\Http\Controllers\CetegoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\NameController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

route::get('/', [FrontendController::class, 'index']);

Auth::routes(['register' => false]);


Route::get('/home', [HomeController::class, 'index'])->name('home');

// profile session start
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::post('profile/name/update', [ProfileController::class, 'name_update'])->name('profile.username');
Route::post('profile/email/update', [ProfileController::class, 'email_update'])->name('profile.useremail');
Route::post('profile/password/update', [ProfileController::class, 'password_update'])->name('profile.password');
Route::post('profile/image/update', [ProfileController::class, 'image_update'])->name('profile.image');
Route::post('delete-users/{id}', [ProfileController::class, 'deleteAllUsers'])->name('users.delete-all');



// management sesson...........
Route::middleware(['roleChek'])->group(function(){

    Route::get('/management', [ManagementController::class, 'index'])->name('management.index');
    Route::post('/management/user/register', [ManagementController::class, 'store_register'])->name('management.store'); //register session er jonno
    Route::post('/management/user/manager/down/{id}', [ManagementController::class, 'manager_down'])->name('management.down'); //role managenment korar jonno
    Route::get('/management/user/manager/delete/{id}', [ManagementController::class, 'manager_delete'])->name('management.delete');

    // role
    Route::get('role',[ManagementController::class, 'role_index'])->name('role_session');
});

// Route::get('/management/user/manager/edit/{id}', [ManagementController::class, 'edit'])->name('management.edit'); //role managenment korar jonno


// setting page start here......
Route::get('setting', [NameController::class, 'setting_index'])->name('setting.index');
Route::get('/user/destroy/{id}', [NameController::class, 'user_destroy'])->name('user_destroy');



// cetegory session start here......
Route::get('/cetegory', [CetegoryController::class, 'index'])->name('cetegory.index');
Route::post('/category/store', [CetegoryController::class, 'store'])->name('category.store');
Route::get('/cetegory/destroy/{slug}', [CetegoryController::class, 'destroy'])->name('category.destroy');
Route::post('/cetegory/status/{id}', [CetegoryController::class, 'status'])->name('category.status');


// problem solve
