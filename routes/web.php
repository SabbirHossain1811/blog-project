<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\settingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

route::get('/', [FrontendController::class, 'index']);

Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/setting', [settingController::class, 'index'])->name('setting.index');

