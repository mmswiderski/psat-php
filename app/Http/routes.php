<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::group(['prefix' => 'test'], function(){

//});

//TODO: opracować poniższe pojęcia
//IoC: Inversion of Control - to jest ogólna koncepcja
//DI: Dependency Injection - jeden ze sposobów na implementację IoC
//DIP: Dependency Inversion Principle - dobra praktyka programowania związana z
// S.O.L.I.D - dograć do gmail'a
//https://laravel.com/docs/5.2/container

App::bind('\Psat\CurrenciesApi', '\Psat\Nbp');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/convert', [
        'as' => 'home',
        'uses' => 'PagesController@mainPage'
    ]);
    Route::post('/convert', 'PagesController@convert');

    Route::get('/solid', [
        'as' => 'solid',
        'uses' => 'PagesController@solid'
    ]);

    Route::get('/', [
        'as' => 'books-home',
        'uses' => 'BooksController@index'
    ]);

    Route::get('/about', [
        'as' => 'books-about',
        'uses' => 'BooksController@about'
    ]);

    Route::get('/authors', [
        'as' => 'books-authors',
        'uses' => 'BooksController@authors'
    ]);

    Route::get('/booktoauthors', [
        'as' => 'books-to-authors',
        'uses' => 'BooksController@bookToAuthors'
    ]);
    
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
