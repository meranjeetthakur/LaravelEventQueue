<?php
use App\Events\TestEvent;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/broadcast', function() {
    event(new TestEvent('Broadcasting in Laravel using Pusher!'));

    return view('welcome');
});

Route::get('/sendEmail', 'UsersController@sendEmail');

//Route::get('/',  'ArticleController@index');
Route::get('/create',  'ArticleController@create');

Route::get('/test', function () {
    event(new App\Events\StatusLiked('Someone'));
    return "Event has been sent!";
});