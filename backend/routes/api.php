<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function() {
    Route::group(['prefix' => 'comments'], function() {
        Route::post('/add', [CommentController::class, 'addComment']);
        Route::put('/edit', [CommentController::class, 'editComment']);
        Route::get('/post/postId={postId}', [CommentController::class, 'commentsOfPost']);
        Route::delete('/delete/commentId={id}', [CommentController::class, 'deleteComment']);
    });
    Route::get('/user', function($request) {
        return $request->user();
    });
    Route::post('/reaction/post/postId={postId}', [ReactController::class, 'likePost']);
});

Route::group(['prefix' => 'auth'], function() {
    Route::post('/signup', [AuthController::class, 'signup']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
});

Route::get('link', function() {
    return URL::to('/images');
});

Route::post('/upload', function(Request $request) {
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $imageName = time().rand(1,100).$image->getClientOriginalName();
            $image->move(public_path('images/'), $imageName);
        }
        return 'success';
    }
});