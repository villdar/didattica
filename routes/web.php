<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserProfileController;
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
// Route::get('profile/', [UserProfileController::class, 'index'])->middleware('auth');
// Route::get('profile/{user:id}', [UserProfileController::class, 'show'])->middleware('auth')->name('profile');

// Admin Section
Route::middleware('can:admin')->group(function () {
    Route::resource('admin/posts', AdminPostController::class)->except('show');
});

//Download guide utente e admin
Route::get('download/{filename}', function ($filename) {
    $file = storage_path('app') . '/'.'download'.'/' . $filename; // or wherever you have stored your PDF files
    return response()->download($file);
});
