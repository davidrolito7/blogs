<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Post;
use App\Models\Image;
use App\Models\Comment;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/post', function (Request $request) {
        // Obtenemos el usuario autenticado
        $user = $request->user();

        // Obtenemos los posts del usuario autenticado
        $posts = $user->posts;

        return $posts;
    });
    Route::get('/image', function (Request $request) {
       
        $image=Image::find(1);
        return $image;
    });
    Route::get('/comment', function (Request $request) {
       
        $comment=Comment::find(1);
        return $comment;
    });
    Route::get('/category', function (Request $request) {
       
        $category=Catengory::find(1);
        return $comment;
    });
});

Route::post('/login', [AuthController::class, 'login']);