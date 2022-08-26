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


Route::view('/admin', 'homeAdmin')
        ->name('admin')->middleware('can:isAdmin');

Route::view('/user', 'homeUser')
        ->name('user')->middleware('can:isUser');

Route::view('/staf', 'homeStaf')
        ->name('staf')->middleware('can:isStaf');

// Rotte per l'autenticazione
Route::get('login', 'Auth\LoginController@showLoginForm')
        ->name('login');

Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')
        ->name('logout');

// Rotte per la registrazione
Route::get('register', 'Auth\RegisterController@showRegistrationForm')
        ->name('register');

Route::post('register', 'Auth\RegisterController@register');

Route::view('/where', 'where')
        ->name('where');

Route::view('/who', 'who')
        ->name('who');

// Rotte inserite dal comando artisan "ui vue --auth" 
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::view('/', 'home')->name('home');

// User routes

Route::view('/newBlog', 'newBlog')
        ->name('newBlog')->middleware('can:isUser');

Route::get('/amici','UserController@getAmici')
        ->name('amici')->middleware('can:isUser');

Route::post('/newBlog','UserController@newBlog')
        ->name('newBlog')->middleware('can:isUser');

Route::get('/myBlogs','UserController@getMyBlogs')
        ->name('myBlogs')->middleware('can:isUser');

Route::get('/blog/{id}','UserController@getBlog')
        ->name('blog')->middleware('can:isUser');

Route::post('/nuvoPost/{id}','UserController@newPost')
        ->name('newPost')->middleware('can:isUser');

Route::post('/searchFriends','UserController@searchFriends')
        ->name('searchFriends')->middleware('can:isUser');

Route::get('/profilo/{id}', 'UserController@getProfilo')
        ->name('visualizzaProfilo');

        
Route::get('/aggiungiAmico/{id}', 'UserController@amicizia')
        ->name('sedRequest');

Route::get('/risposta/{id}/{risposta}','UserController@rispostaAmicizia')
        ->name('risposta');
