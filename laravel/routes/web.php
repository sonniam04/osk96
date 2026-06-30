<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\MemberAuthController;
use App\Http\Controllers\Auth\AdminAuthController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Member Auth
Route::get('/login', [MemberAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [MemberAuthController::class, 'login'])->name('login.post');
Route::get('/logout', [MemberAuthController::class, 'logout'])->name('logout');

// Admin Auth
Route::get('/admin', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::get('/admin/dashboard', fn() => 'Admin Dashboard (Coming Soon)')->name('admin.dashboard');

// Placeholder routes (จะทำ feature เพิ่มทีละ module)
Route::get('/webboard', fn() => abort(404))->name('webboard.index');
Route::get('/guestbook', fn() => abort(404))->name('guestbook.index');
Route::get('/download', fn() => abort(404))->name('download.index');
Route::get('/bill', fn() => abort(404))->name('bill.index');
Route::get('/message', fn() => abort(404))->name('message.index');
Route::get('/contact', fn() => abort(404))->name('contact.index');
Route::get('/contact/webmaster', fn() => abort(404))->name('contact.webmaster');
