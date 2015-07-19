<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});


Route::get('api/recipes', 'RecipeController@show');
Route::get('api/recipes/{id}', 'RecipeController@get');
Route::get('api/search/recipes/{search?}', 'RecipeController@show');
Route::get('api/search_code/recipes/{code?}', 'RecipeController@searchByCode');
Route::post('api/recipes', 'RecipeController@create');
Route::put('api/recipes', 'RecipeController@update');


Route::get('api/ingredients', 'IngredientController@show');
Route::post('api/ingredients', 'IngredientController@create');
Route::put('api/ingredients', 'IngredientController@update');

Route::get('api/products', 'ProductController@show');
Route::post('api/products', 'ProductController@create');
Route::put('api/products', 'ProductController@update');

Route::get('api/categories', 'CategoryController@show');
Route::post('api/categories', 'CategoryController@create');
Route::put('api/categories', 'CategoryController@update');