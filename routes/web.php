<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
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




Route::get('/',[SearchController::class, 'inbox'])->name('home');

Route::post('search',[SearchController::class, 'seachbox'])->name('search');

Route::get('details/{id}', [SearchController::class, 'details']);

Route::get('signup',[UserController::class, 'signup'])->name('signup');

Route::post('signup',[UserController::class,'insert'])->name('user-signup');

Route::get('login',[UserController::class,'login'])->name('login');

Route::post('login',[UserController::class,'loginuser'])->name('user-login');


// Route::get('details', [SearchController::class, 'details']);



Route::middleware(['checkUserSession'])->group(function(){
    Route::get('details/{id}', [SearchController::class, 'details'])->name('details');
    Route::post('comment',[CommentController::class,'storecomment'])->name('comment');
    Route::get('logout',[UserController::class,'logout'])->name('logout');
    
});


