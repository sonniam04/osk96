<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Placeholder routes (จะทำ feature เพิ่มทีละ module)
Route::get('/login', fn() => abort(404))->name('login');
Route::get('/logout', fn() => abort(404))->name('logout');
Route::get('/webboard', fn() => abort(404))->name('webboard.index');
Route::get('/guestbook', fn() => abort(404))->name('guestbook.index');
Route::get('/download', fn() => abort(404))->name('download.index');
Route::get('/bill', fn() => abort(404))->name('bill.index');
Route::get('/message', fn() => abort(404))->name('message.index');
Route::get('/contact', fn() => abort(404))->name('contact.index');
Route::get('/contact/webmaster', fn() => abort(404))->name('contact.webmaster');
