<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\UnityController;

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


Route::prefix('v1')->group(function () {
    Route::get('/search/unity', [UnityController::class, 'searchUnity']);
    Route::get('/unity/get', [UnityController::class, 'getUnity']);
    Route::get('/metrics/unity', [UnityController::class, 'getMetric']);
    Route::get('/rates/unity', [UnityController::class, 'getRates']);
    Route::get('/contacts/unity', [UnityController::class, 'getContacts']);
    Route::get('/overview/unity', [UnityController::class, 'getOverview']);
    Route::get('/connection/unity', [UnityController::class, 'getConnection']);
    Route::get('/connection-preperety/unity', [UnityController::class, 'getProperetyConnection']);
    Route::get('/audience-account/unity', [UnityController::class, 'getAudienceAccount']);
    Route::get('/search/content', [UnityController::class, 'getSearchContent']);
    Route::get('/white-label-organizations', [UnityController::class, 'getWhiteLabelOrganizations']);
});