<?php
use Illuminate\Http\Request;
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
Route::post('Member/','api\APIMemberController@login');
Route::post('Member/SingUp','api\APIMemberController@SingUp');
Route::get('News','api\APINewsController@index');
Route::get('Detail/{id}','api\APINewController@detail');