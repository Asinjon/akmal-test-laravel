<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::get('/login', [LoginController::class, 'index'])->name('login.create');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

Route::get('/books', [BookController::class, 'index'])->name('books');
Route::get('/posts', [PostController::class, 'index']);

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::prefix('books')->group(function () {
        Route::get('/create', [BookController::class, 'create']);
        Route::post('/', [BookController::class, 'store']);
        Route::get('/{book}/edit', [BookController::class, 'edit']);
        Route::put('/{book}', [BookController::class, 'update']);
        Route::delete('/{book}', [BookController::class, 'destroy']);
        Route::post('/create_comment', [CommentController::class, 'storeComments']);
    });
    //---------------------------------------------------------------------------------
    Route::prefix('posts')->group(function () {
        Route::get('/create', [PostController::class, 'create']);
        Route::post('/', [PostController::class, 'store']);
        Route::get('/{post}/edit', [PostController::class, 'edit']);
        Route::put('/{post}', [PostController::class, 'update']);
        Route::delete('/{post}', [PostController::class, 'destroy']);
        Route::post('/create_comment', [CommentController::class, 'storeComments']);
    });

});
Route::get('/post_comment/{post}', [CommentController::class, 'postcomments']);
Route::get('/book_comment/{book}', [CommentController::class, 'bookcomments']);

Route::get('/home', function () {
    return view('welcome');
})->name('welcome');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


//Route::get('/email/verify', function () {
//    return view('auth.verify-email');
//})->middleware('auth')->name('verification.notice');
//
//Route::get('/email/verification-notification', function (Request $request) {
//    $request->user()->sendEmailVerificationNotification();
//
//    return back()->with('message', 'Verification link sent!');
//})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
//
//Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//    $request->fulfill();
//
//    return redirect()->route('welcome');
//})->middleware(['auth', 'signed'])->name('verification.verify');

Route::middleware('guest')->group(function () {
    Route::get('/forgot-password', [PasswordResetController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetController::class, 'store'])->name('password.email');
    Route::get('/reset-password', [ResetPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'store'])->name('password.update');
});

Route::middleware('auth')->group(function () {
   Route::post('/verification-check', [EmailVerificationController::class, 'check'])->name('verification-check');
});