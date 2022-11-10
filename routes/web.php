<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', IndexController::class)->name('main.index');
});

Route::group(['namespace' => 'App\Http\Controllers\Post', 'prefix' => 'posts'], function () {
    Route::get('/', IndexController::class)->name('post.index');
    Route::get('/{post}', ShowController::class)->name('post.show');
    Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comments'], function () {
        Route::post('/', StoreController::class)->name('post.comment.store');
    });
    Route::group(['namespace' => 'Like', 'prefix' => '{post}/likes'], function () {
       Route::post('/', StoreController::class)->name('post.like.store');
    });
    Route::group(['namespace' => 'Category', 'prefix' => 'category'], function() {
       Route::get('/{category}', IndexController::class)->name('post.category.index');
    });
    Route::group(['namespace' => 'Tag', 'prefix' => 'tag'], function() {
        Route::get('/{tag}', IndexController::class)->name('post.tag.index');
    });
});

Route::group(['middleware' => 'guest', 'prefix' => 'vk/auth/'], function () {
   Route::get('/', \App\Http\Controllers\Social\Vk\IndexController::class)->name('vk.auth');
   Route::get('/callback', \App\Http\Controllers\Social\Vk\CallBackController::class);
   Route::get('/email', \App\Http\Controllers\Social\Vk\AddController::class)->name('vk.email.add');
   Route::post('/store', \App\Http\Controllers\Social\Vk\StoreController::class)->name('vk.email.store');
});

Route::group(['middleware' => 'guest', 'prefix' => 'google/auth/'], function () {
    Route::get('/', \App\Http\Controllers\Social\Google\IndexController::class)->name('google.auth');
    Route::get('/callback', \App\Http\Controllers\Social\Google\CallBackController::class);
});


Route::group(['namespace' => 'App\Http\Controllers\Personal', 'prefix' => 'personal', 'middleware' => ['auth', 'verified']], function () {

    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', IndexController::class)->name('personal.main.index');
    });
    Route::group(['namespace' => 'Like', 'prefix' => 'likes'], function () {
        Route::get('/', IndexController::class)->name('personal.like.index');
        Route::delete('/{post}', DeleteController::class)->name('personal.like.delete');
    });
    Route::group(['namespace' => 'Comment', 'prefix' => 'comment'], function () {
        Route::get('/', IndexController::class)->name('personal.comment.index');
        Route::get('/{comment}/edit', EditController::class)->name('personal.comment.edit');
        Route::patch('/{comment}', UpdateController::class)->name('personal.comment.update');
        Route::delete('/{comment}', DeleteController::class)->name('personal.comment.delete');
    });
    Route::group(['namespace' => 'User', 'prefix' => 'user'], function () {
        Route::get('/', IndexController::class)->name('personal.user.index');
        Route::get('/edit', EditController::class)->name('personal.user.edit');
        Route::patch('/{user}', UpdateController::class)->name('personal.user.update');
        Route::delete('/{user}', DeleteController::class)->name('personal.user.delete');
    });

});



Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'verified', 'admin']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', IndexController::class)->name('admin.main.index');
    });


    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', IndexController::class)->name('admin.user.index');
        Route::get('/create', CreateController::class)->name('admin.user.create');
        Route::post('/', StoreController::class)->name('admin.user.store');
        Route::get('/{user}', ShowController::class)->name('admin.user.show');
        Route::get('/{user}/edit', EditController::class)->name('admin.user.edit');
        Route::patch('/{user}', UpdateController::class)->name('admin.user.update');
        Route::delete('/{user}', DeleteController::class)->name('admin.user.delete');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', IndexController::class)->name('admin.category.index');
        Route::get('/create', CreateController::class)->name('admin.category.create');
        Route::post('/', StoreController::class)->name('admin.category.store');
        Route::get('/{category}', ShowController::class)->name('admin.category.show');
        Route::get('/{category}/edit', EditController::class)->name('admin.category.edit');
        Route::patch('/{category}', UpdateController::class)->name('admin.category.update');
        Route::delete('/{category}', DeleteController::class)->name('admin.category.delete');
    });
    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', IndexController::class)->name('admin.tag.index');
        Route::get('/create', CreateController::class)->name('admin.tag.create');
        Route::post('/', StoreController::class)->name('admin.tag.store');
        Route::get('/{tag}', ShowController::class)->name('admin.tag.show');
        Route::get('/{tag}/edit', EditController::class)->name('admin.tag.edit');
        Route::patch('/{tag}', UpdateController::class)->name('admin.tag.update');
        Route::delete('/{tag}', DeleteController::class)->name('admin.tag.delete');
    });
    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/', IndexController::class)->name('admin.post.index');
        Route::get('/create', CreateController::class)->name('admin.post.create');
        Route::post('/', StoreController::class)->name('admin.post.store');
        Route::get('/{post}', ShowController::class)->name('admin.post.show');
        Route::get('/{post}/edit', EditController::class)->name('admin.post.edit');
        Route::patch('/{post}', UpdateController::class)->name('admin.post.update');
        Route::delete('/{post}', DeleteController::class)->name('admin.post.delete');
    });
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
