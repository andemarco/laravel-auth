<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
// ROTTA VERSO HOME CON POST VISIBILI
Route::get('/', 'HomeController@index')->name('home');
//ROTTA VERSO LA PAGINE DEL SINGOLO ADMIN
Route::name('admin.')
    ->prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function() {
    Route::resource('posts','PostController');

});
//rotta commenti
Route::post('comment/{id}', 'CommentController@comment')->name('comment');
//rotta show guest
Route::get('/show{id}', 'HomeController@show')->name('show');
