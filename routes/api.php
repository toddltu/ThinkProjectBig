<?php

use App\Http\Controllers\PostMenController;
// use Illuminate\Http\Request;
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
//Route::prefix('api')->group(function (){});


Route::group(['middleware' => ['auth:sanctum']], function () {
    $postMen = '/postmen';
    Route::get( $postMen, [PostMenController::class, 'index']);
    Route::get($postMen.'/{id}', [PostMenController::class, 'show']);
    Route::post($postMen, [PostMenController::class, 'store']);
    Route::put($postMen, [PostMenController::class, 'update']);
    Route::delete($postMen.'/{id}', [PostMenController::class, 'destroy']);

});

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
