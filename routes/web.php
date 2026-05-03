<?php

use App\Http\Controllers\Auth\AuthController;
use App\Models\Post;
use App\Http\Controllers\ChangeController;
use App\Http\Controllers\PostController;
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
    $data = Post::with('user')->get();
    $user = Auth::user();
    return view('about', compact('data', 'user'));
})->name('about');

Route::get('/contact', function () {
    $data = Post::with('user')->get();
    $user = Auth::user();
    return view('contact', compact('data', 'user'));
})->name('contact');

// Auth Func
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::get('/register', [AuthController::class, 'registerPage']);
Route::post('/login', [AuthController::class, 'login'])->name('login.user');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register', [AuthController::class, 'register'])->name('register');


// Post
Route::get('/blog', [PostController::class, 'blog'])->name('blog');
Route::get('/blog/detail/{id}', [PostController::class, 'blog_detail'])->name('detail');
Route::get('/blog/author/{id}', [PostController::class, 'author'])->name('author');

// Post Func
Route::delete('/deletepost/{id}', [PostController::class, 'destroy'])->name('delete');

Route::middleware('auth', 'Check_Role:user')->group(function () {
    Route::post('/blog/create', [PostController::class, 'create_post'])->name('post.create');
    Route::get('/profile/change-password', [ChangeController::class, 'changePage'])->name('change.page');
    Route::post('/profile/change-password', [ChangeController::class, 'change'])->name('change.password');
    Route::get('/blog/create', [PostController::class, 'create'])->name('create');
    Route::get('/profile/blog/{id}', [PostController::class, 'myblog'])->name('myblog');
    Route::post('/update/{id}', [AuthController::class, 'update_user'])->name('update.user');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::get('/profile/blog/edit/{id}', [PostController::class, 'edit_post'])->name('edit');
    Route::post('/profile/blog/edit/{id}', [PostController::class, 'save_post'])->name('save.post');
});
