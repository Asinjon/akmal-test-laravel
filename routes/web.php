<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PostController;

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

Route::middleware('auth')->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/books/{user_id}', [BookController::class, 'show'])->name('books');
    Route::get('/booksMake', [BookController::class, 'create']);
    Route::post('/booksMake', [BookController::class, 'store']);
    Route::get('update/{book}', [BookController::class, 'edit']);
    Route::post('update/{book}', [BookController::class, 'update']);
    Route::get('/delete_book/{book}', [BookController::class, 'destroy']);
});

Route::get('/home', function () {
    return view('welcome');
})->name('welcome');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('welcome');
})->middleware(['auth', 'signed'])->name('verification.verify');