<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ChatbotageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::middleware(['auth', 'checkArticleOwner'])->group(function () 
{
    Route::get('/articles/{id}/edit', [ArticleController::class, 'edit']);
    Route::put('/articles/{id}', [ArticleController::class, 'update']);
});

Route::middleware(['auth'])->group(function () 
{
    Route::get('/article', [ArticleController::class, 'show']); 

    Route::get('/users', [UserController::class, 'index']); 
    Route::delete('/users/{id}', [UserController::class, 'destroy']); 

    Route::get('/comments/{article_id}', [CommentController::class, 'index']); 
    Route::post('/comments', [CommentController::class, 'store']); 
    Route::delete('/comments/{id}', [CommentController::class, 'destroy']); 

    Route::post('/chatbot', [ChatbotageController::class, 'store']); 
    Route::get('/chatbot', [ChatbotageController::class, 'index']); 
});


Route::middleware(['guest'])->group(function () 
{
    Route::get('/register', [AuthController::class, 'showregisterform'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::get('/login', [AuthController::class, 'showloginform'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

    // Route::get('/home', function()
    // {
    //     return 'مرحبا بك في الصفحه الرئيسية يا هيما;
    // })->name('welcome')->middleware('auth');

    Route::view('/', 'home');
});


