<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// User Page Without Controller
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

// User Page
Route::get('/profile', [AuthController::class, 'profile'])->name('profile');

// Auth Func
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::get('/register', [AuthController::class, 'registerPage']);
Route::post('/login', [AuthController::class, 'login'])->name('login.user');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/update/{id}', [AuthController::class, 'update_user'])->name('update.user');
Route::post('/blog/create', [PostController::class, 'create_post'])->name('post.create');

// Post
Route::get('/blog/create', [PostController::class, 'create'])->name('create');
Route::get('/blog', [PostController::class, 'blog'])->name('blog');
Route::get('/blog/detail/{id}', [PostController::class, 'blog_detail'])->name('detail');
Route::get('/blog/author/{id}', [PostController::class, 'author'])->name('author');
Route::get('/profile/blog/{id}', [PostController::class, 'myblog'])->name('myblog');
