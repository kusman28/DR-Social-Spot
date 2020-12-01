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

Route::apiResources(['post' => 'API\PostController']);
Route::get('posts','API\PostController@posts');

Route::post('/like/{id}','API\PostController@like');
Route::get('/comments/{id}', 'API\PostController@comments');



// Route::get('profile', 'API\ProfileController@profile');
// Route::put('profile', 'API\ProfileController@update');