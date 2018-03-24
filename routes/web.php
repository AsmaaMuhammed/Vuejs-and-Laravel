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
//Route::group(['prefix'=>'{lang}','middleware'=>'local'],function (){
//    Route::get('/', function () {
//        return view('welcome');
//    });
//});

Route::get('/', function () {
    return view('welcome');
});
Route::group(['namespace'=>'V1\Admin'],function (){
    Route::resource('companies','CompaniesController',['except'=>['create','edit']]);
});
//Route::get('/','CompaniesController@index');
//Route::get('/create','CompaniesController@create');
//Route::post('/create','CompaniesController@store');
//Route::get('/{id}','CompaniesController@update');
//Route::post('/{id}','CompaniesController@edit');
//Route::delete('/{id}','CompaniesController@destroy');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
