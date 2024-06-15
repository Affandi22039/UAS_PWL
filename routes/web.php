<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiControl;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function(){
    Route::get('/',[SesiControl::class,'index'])->name('login');
    Route::post('/',[SesiControl::class,'login']);

    // Rute untuk registrasi
    Route::get('/register', function () {
        return view('register');
    });
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/home',function(){
    return redirect('/admin');
});

// Rute untuk halaman berita
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/all', [PostController::class, 'all'])->name('posts.all');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

Route::middleware(['auth'])->group(function(){
    Route::get('/admin',[AdminController::class,'index']);
    Route::get('/admin/admin',[AdminController::class,'admin'])->middleware('AksesUser:admin');
    Route::get('/admin/pengelola',[AdminController::class,'pengelola'])->middleware('AksesUser:pengelola');
    Route::get('/logout',[SesiControl::class,'logout']);
});
Route::middleware(['auth', 'AksesUser:admin'])->group(function () {
    Route::get('/posts/datatables', [PostController::class, 'datatables'])->name('posts.datatables');
});
// Route resource CRUD untuk posts, hanya untuk admin
Route::middleware(['auth', 'AksesUser:admin'])->group(function () {
    Route::resource('posts', PostController::class)->except(['index', 'show']);
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
});

