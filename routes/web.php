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
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('setting', [NameController::class, 'setting_index'])->name('setting.index');
Route::post('setting/name/update', [NameController::class, 'name_update'])->name('setting.username');
Route::post('setting/email/update', [NameController::class, 'email_update'])->name('setting.useremail');
Route::post('setting/password/update', [NameController::class, 'password_update'])->name('setting.password');
Route::post('setting/image/update', [NameController::class, 'image_update'])->name('setting.image');


// cetegory session start here......
Route::get('/cetegory', [CetegoryController::class, 'index'])->name('cetegory.index');
Route::post('/category/store',[CetegoryController::class,'store'])->name('category.store');

