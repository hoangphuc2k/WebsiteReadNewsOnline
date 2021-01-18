<?php
use Illuminate\Http\Request;
use App\News;   

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

Route::get('News/ListHotNews','api\APINewsController@ListHotNews');

Route::get('News/ListSportNews','api\APINewsController@ListSportNews');

Route::get('storage/{filename}', function ($filename)
{
    return Image::make('public/' . $filename)->response();
});
Route::get('savenews/{id}','api\SaveNewsController@show');

Route::post('save','api\SaveNewsController@store');

Route::get('Detail/{id}','api\APINewsController@detail');

Route::get('News','api\APINewsController@index');

Route::get('show/{id}','api\APINewsController@show');

//vi du ve api Chi Linh, viet linh tinh de do, dung xoa nha
Route::get('Comment','api\CommentController@index');

Route::get('showComment/{id}','api\CommentController@show');


