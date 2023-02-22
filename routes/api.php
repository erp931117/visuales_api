<?php

use App\Http\Controllers\SerieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('series', [SerieController::class, "index"])->name('series');

Route::get('series/most_download', [SerieController::class, "mostDownloads"])->name('mostDownloads');

Route::get('series/popular', [SerieController::class, "popularSeries"])->name('popularSeries');

Route::get('series/random', [SerieController::class, "randomSeries"])->name('randomSeries');

Route::get('series/best', [SerieController::class, "mostPopular"])->name('mostPopular');

Route::get('series/download/{id}', [SerieController::class, 'increaseDownload'])->name('increaseDownload');

Route::get('series/{id}', [SerieController::class, "show"])->name('showSerie');

Route::get('series/search/{name}', [SerieController::class, "searchByName"])->name('searchByName');

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::group(['middleware' => ["auth:sanctum"]], function () {
    //rutas
    Route::get('user-profile', [UserController::class, 'userProfile']);
    Route::get('logout', [UserController::class, 'logout']);
});
