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
    return response()->json(null);
});

Route::post('/api/join', 'UserController@join');
// - POST   /api/join
// Route::controller('/api/sessions', 'SessionController');
// - POST   /api/sessions
// - DELETE /api/sessions 
// Route::controller('/api/users', 'UserController');
// - GET    /api/users
// - GET  	/api/users/:id
// - PUT    /api/users/:id
// - DELETE /api/users/:id
// Route::controller('/api/user/following', 'FollowController');
// - PUT    /api/user/following/:id
// - DELETE /api/user/following/:id
// Route::get('/api/users/{id}/followers', 'UserController@listFollowers');
// - GET    /api/users/:id/followers
