<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
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

Auth::routes();



/** ROUTE FOR POSTS **/
Route::resource('posts', PostController::class)->except(['index']);
Route::get('/', [PostController::class, 'index'])->name('home');

/** ROUTE FOR COMMENTS **/
Route::resource('comments', CommentController::class);