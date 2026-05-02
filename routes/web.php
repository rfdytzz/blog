<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $user = Auth::user();
    return view('index', compact('user'));
})->name('home');

Route::get('/blog', function () {
    $data = Post::with('user')->get();
    $user = Auth::user();
    return view('blog', compact('user', 'data'));
})->name('blog');


Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
Route::get('/blog', [PostController::class, 'blog'])->name('blog');
Route::get('/blog/detail/{id}', [PostController::class, 'blog_detail'])->name('detail');

Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::get('/register', [AuthController::class, 'registerPage']);

// Function
Route::post('/login', [AuthController::class, 'login'])->name('login.user');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/update/{id}', [AuthController::class, 'update_user'])->name('update.user');
Route::post('/blog/create', [PostController::class, 'create_post'])->name('post.create');

// Post
Route::get('/blog/create', [PostController::class, 'create'])->name('create');
Route::get('/blog/read/{id}', [PostController::class, 'create'])->name('detail');
