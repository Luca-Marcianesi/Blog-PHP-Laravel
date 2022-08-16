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

Route::get('/selTopCat/{topCatId}/selCat/{catId}', 'PublicController@showCatalog3')
        ->name('catalog3');

Route::get('/selTopCat/{topCatId}', 'PublicController@showCatalog2')
        ->name('catalog2');

Route::get('/', 'PublicController@showCatalog1')
        ->name('catalog1');

Route::get('/admin/newproduct', 'AdminController@addProduct')
        ->name('newproduct');

Route::post('/admin/newproduct', 'AdminController@storeProduct')
        ->name('newproduct.store');

Route::get('/admin', 'AdminController@index')
        ->name('admin');

Route::view('/user', 'homeUser')
        ->name('user')->middleware('can:isUser');

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

Route::view('/home', 'layouts\public')->name('home');

// User routes

Route::view('/newBlog', 'newBlog')
        ->name('newBlog')->middleware('can:isUser');

Route::post('/newBlog','UserController@newBlog')
        ->name('newBlog')->middleware('can:isUser');

Route::get('/myBlogs','UserController@getMyBlogs')
        ->name('myBlogs')->middleware('can:isUser');
