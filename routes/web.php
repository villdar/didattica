<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserPublicProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('newsletter', NewsletterController::class);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('/category', [PostController::class, 'postBody']);

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
Route::get('/profile', [UserProfileController::class, '__invoke'])->middleware('auth')->name('profile');
Route::get('profile/{user:username}', [UserPublicProfileController::class, 'show'])->name('public-profile');

// Admin Section
Route::middleware('can:admin')->group(function () {
    Route::resource('admin/posts', AdminPostController::class)->except('show');
    Route::get('admin/posts/analytics', AdminPostController::class, '__invoke');
});

//Download guide utente e admin
Route::get('download/{filename}', function ($filename) {
    $file = storage_path('app') . '/'.'download'.'/' . $filename; // or wherever you have stored your PDF files
    return response()->download($file);
});
