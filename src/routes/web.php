<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;

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

//ログインのルーティング
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

//ログアウトのルーティング
Route::post('/logout', [AuthController::class, 'logout']);

//ユーザー登録ルーティング
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

//以下ブログページ
Route::get('/', [ArticleController::class, 'index']);
Route::get('/detail/{id}', [ArticleController::class, 'detail']);

Route::middleware(['auth'])->group(function () {
    //投稿
    Route::get('/post', [ArticleController::class, 'showPost']);
    Route::post('/post', [ArticleController::class, 'post']);
    //編集
    Route::get('/edit/{id}', [ArticleController::class, 'edit']);
    Route::patch('/edit/{id}', [ArticleController::class, 'update']);
    //削除
    Route::get('/delete/{id}', [ArticleController::class, 'delete']);
    Route::delete('/delete/{id}', [ArticleController::class, 'destroy']);
});
