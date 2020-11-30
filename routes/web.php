<?php

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

use App\Http\Controllers\NewsController;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return view('index');
})->middleware('auth');;
Route::prefix('News')->group(function(){
    Route::get('/','NewsController@index')->name('News./');
    Route::get('index','NewsController@index')->name('News.index');
    Route::get('create','NewsController@create')->name('News.create');
    Route::post('store','NewsController@store')->name('News.store');
    Route::get('show/{id}','NewsController@show')->name('News.show');
    Route::get('edit/{id}','NewsController@edit')->name('News.edit');
    Route::put('update','NewsController@update')->name('News.update');
});
Route::prefix('Category')->group(function(){
    Route::get('/','CategoryController@index')->name('Category./');
    Route::get('index','CategoryController@index')->name('Category.index');
    Route::get('create','CategoryController@create')->name('Category.create');
    Route::post('store','CategoryController@store')->name('Category.store');
    Route::get('show/{id}','CategoryController@show')->name('Category.show');
    Route::get('edit/{id}','CategoryController@edit')->name('Category.edit');
    Route::PATCH('update/{id}','CategoryController@update')->name('Category.update');
    Route::DELETE('delete/{id}','CategoryController@destroy')->name('Category.delete');
});
Route::prefix('User')->group(function(){
    Route::get('/','UserController@index')->name('User./');
    Route::get('index','UserController@index')->name('User.index');
    Route::get('create','UserController@create')->name('User.create');
    Route::post('store','UserController@store')->name('User.store');
    Route::get('show/{id}','UserController@show')->name('User.show');
    Route::get('edit/{id}','UserController@edit')->name('User.edit');
    Route::put('update/','UserController@update')->name('User.update');
});
Route::prefix('Banner')->group(function(){
    Route::get('/','BannerController@index')->name('Banner./');
    Route::get('index','BannerController@index')->name('Banner.index');
    Route::get('create','BannerController@create')->name('Banner.create');
    Route::post('store','BannerController@store')->name('Banner.store');
    Route::get('show/{id}','BannerController@show')->name('Banner.show');
    Route::get('edit/{id}','BannerController@edit')->name('Banner.edit');
    Route::put('update','BannerController@update')->name('Banner.update');
});
Route::prefix('Member')->group(function(){
    Route::get('/','MemberController@index')->name('MemBer./');
    Route::get('index','MemberController@index')->name('MemBer.index');
    Route::get('create','MemberController@create')->name('MemBer.create');
    Route::post('store','MemberController@store')->name('MemBer.store');
    Route::get('show/{id}','MemberController@show')->name('MemBer.show');
    Route::get('edit/{id}','MemberController@edit')->name('MemBer.edit');
    Route::put('update','MemberController@update')->name('MemBer.update');
});
Route::prefix('Role')->group(function(){
    Route::get('/','RolesController@index')->name('Roles./');
    Route::get('index','RolesController@index')->name('Roles.index');
    Route::get('create','RolesController@create')->name('Roles.create');
    Route::post('store','RolesController@store')->name('Roles.store');
    Route::get('show/{id}','RolesController@show')->name('Roles.show');
    Route::get('edit/{id}','RolesController@edit')->name('Roles.edit');
    Route::PATCH('update/{id}','RolesController@update')->name('Roles.update');
    Route::DELETE('delete/{id}','RolesController@destroy')->name('Roles.delete');
});
Route::get('Login',function(){
    return view('login');
})->name('Login');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
