<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('posts.home');
// });

// Route::get('posts', [PostController::class, 'index']);

// //create
// Route::get('posts/create', [PostController::class, 'create']);
// //store
// Route::post('posts', [PostController::class, 'store']);

// //view
// Route::get('posts/{id}', [PostController::class, 'show']);

// //edit
// Route::get('posts/{id}/edit', [PostController::class, 'edit']);
// //delete
// Route::delete('posts/{id}', [PostController::class, 'destroy']);
// //update
// Route::put('posts/{id}', [PostController::class, 'update']);
// //show all posts
// Route::get('/', [PostController::class, 'home']);

Route::middleware('auth')->group(function(){
    Route::get('posts', [PostController::class, 'index']);

    //create
    Route::get('posts/create', [PostController::class, 'create']);
    //store
    Route::post('posts', [PostController::class, 'store']);

    //view
    Route::get('posts/{id}', [PostController::class, 'show']);

    //edit
    Route::get('posts/{id}/edit', [PostController::class, 'edit']);
    //delete
    Route::delete('posts/{id}', [PostController::class, 'destroy']);
    //update
    Route::put('posts/{id}', [PostController::class, 'update']);
    //show all posts
    Route::get('/', [PostController::class, 'home']);
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
