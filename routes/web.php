<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MicropostsController;
use App\Http\Controllers\UserFollowController;
use App\Http\Controllers\FavoritesController;

Route::get('/', [MicropostsController::class, 'index']);

Route::get('/dashboard', [MicropostsController::class, 'index'])->middleware(['auth'])->name('dashboard');

// Route::get('/edit', [UsersController::class, 'edit'])->name('users.edit');
Route::get('/edit', 'UsersController@edit')->middleware(['auth'])->name('users.edit');
Route::get('/update', 'UsersController@update')->middleware(['auth'])->name('users.update');
Route::post('/update', 'UsersController@update')->middleware(['auth'])->name('users.update');
require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'users/{id}'], function () {                                          
        Route::post('follow', [UserFollowController::class, 'store'])->name('user.follow');         
        Route::delete('unfollow', [UserFollowController::class, 'destroy'])->name('user.unfollow'); 
        Route::get('followings', [UsersController::class, 'followings'])->name('users.followings'); 
        Route::get('followers', [UsersController::class, 'followers'])->name('users.followers');    
        Route::get('favorites', [UsersController::class, 'favorites'])->name('users.favorites'); 
        Route::get('edit', [UsersController::class, 'edit'])->name('users.edit');
        Route::get('update', [UsersController::class, 'update'])->name('users.update');
        Route::post('update', [UsersController::class, 'update'])->name('users.update');
        

        
    });                                                                                             
    
    Route::resource('users', UsersController::class, ['only' => ['index', 'show', 'edit', 'update']]);
    Route::resource('microposts', MicropostsController::class, ['only' => ['store', 'destroy']]);
    
    
    Route::group(['prefix' => 'microposts/{id}'], function () {                                             
        Route::post('favorite', [FavoritesController::class, 'store'])->name('user.favorite');        
        Route::delete('unfavorite', [FavoritesController::class, 'destroy'])->name('user.unfavorite'); 
    });                                                                                                     
});