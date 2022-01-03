<?php

use App\Http\Controllers\Auth\MeController;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Auth\SignOutController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
        'middleware' => ['api', 'auth:api'],
        'prefix' => 'auth'
    ], 
   function () {
    Route::post('login', SignInController::class)->withoutMiddleware(['auth:api']);
    Route::get('user', MeController::class);
    Route::post('logout', SignOutController::class);


});

Route::get('videos', [VideoController::class, 'index']);
Route::post('videos', [VideoController::class, 'store']);
Route::get('videos/{video}', [VideoController::class, 'show']);
Route::delete('videos/{video}', [VideoController::class, 'destroy']);
Route::patch('videos/{video}', [VideoController::class, 'update']);

//Tags routes
Route::get('tags', [TagController::class, 'index']);
Route::post('tags', [TagController::class, 'store']);
Route::patch('tags/{tag}', [TagController::class, 'update']);
Route::delete('tags/{tag}', [TagController::class, 'destroy']);
//end of Tag routes

Route::get('users', [UserController::class, 'index']);
Route::post('user', [UserController::class, 'store']);

Route::post('mark/{video}', [VideoController::class, 'mark'])->middleware(['auth:api']);
Route::post('image-upload', [ ImageUploadController::class, 'imageUploadPost' ]);


