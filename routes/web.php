<?php

use App\Http\Controllers\CetegoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NameController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

route::get('/', [FrontendController::class, 'index']);

Auth::routes(['register' => false]);


Route::get('/home', [HomeController::class, 'index'])->name('home');

// profile session start
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::post('profile/name/update', [ProfileController::class, 'name_update'])->name('profile.username');
Route::post('profile/email/update', [ProfileController::class, 'email_update'])->name('profile.useremail');
Route::post('profile/password/update', [ProfileController::class, 'password_update'])->name('profile.password');
Route::post('profile/image/update', [ProfileController::class, 'image_update'])->name('profile.image');

// setting page start here......
Route::get('setting', [NameController::class, 'setting_index'])->name('setting.index');


// cetegory session start here......
Route::get('/cetegory', [CetegoryController::class, 'index'])->name('cetegory.index');
Route::post('/category/store', [CetegoryController::class, 'store'])->name('category.store');
Route::get('/cetegory/edit/{slug}',[CetegoryController::class,'edit'])->name('category.edit');
Route::post('/cetegory/update/{slug}',[CetegoryController::class,'update'])->name('category.update');
Route::get('/cetegory/destroy/{slug}',[CetegoryController::class,'destroy'])->name('category.destroy');
Route::post('/cetegory/status/{id}',[CetegoryController::class,'status'])->name('category.status');

