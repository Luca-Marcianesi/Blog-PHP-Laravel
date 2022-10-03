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
Auth::routes();

Route::view('/', 'home')->name('home');

Route::view('/where', 'where')
        ->name('where');

Route::view('/who', 'who')
        ->name('who');

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



// Rotte inserite dal comando artisan "ui vue --auth" 
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');



// User routes

Route::view('/profilo','profilo')
        ->name('profilo')->middleware('can:isUser');

Route::post('/modificaProfilo', 'UserController@modificaProfilo')
        ->name('modificaProfilo');

Route::view('/newBlog', 'newBlog')
        ->name('newBlog')->middleware('can:isUser');

Route::get('/notifiche', 'UserController@getNotifiche')
        ->name('notifiche')->middleware('can:isUser');

Route::get('/amici','UserController@getAmici')
        ->name('amici')->middleware('can:isUser');

Route::post('/newBlog','UserController@newBlog')
        ->name('newBlog')->middleware('can:isUser');

Route::get('/myBlogs','UserController@getMyBlogs')
        ->name('myBlogs')->middleware('can:isUser');

Route::post('/modificaBlog/{id}','UserController@modificaBlog')
        ->name('modificaBlog')->middleware('can:isUser');


Route::get('/blog/{id}','UserController@getBlog')
        ->name('blog')->middleware('can:isUser');

Route::post('/nuvoPost/{id}','UserController@newPost')
        ->name('newPost')->middleware('can:isUser');

Route::post('/searchFriends','UserController@searchFriends')
        ->name('searchFriends')->middleware('can:isUser');

Route::get('/profilo/{id}', 'UserController@getProfilo')
        ->name('visualizzaProfilo');

Route::get('/blog/{id}', 'UserController@selezionaAmici')
        ->name('selezionaAmici');

        
Route::get('/aggiungiAmico/{id}', 'UserController@amicizia')
        ->name('sedRequest');


Route::get('/risposta/{id}/{risposta}','UserController@rispostaAmicizia')
        ->name('risposta');

Route::get('/elimina/{id_amicizia}/{user_id}','UserController@eliminaAmico')
        ->name('eliminaAmico');

Route::get('/elimina/{notifica}','UserController@eliminaNotifica')
        ->name('eliminaNotifica');


// Admin routes

Route::get('/statistiche','AdminController@getMainStatistiche')
        ->name('statistiche');

Route::post('/getStatisticheSpecifiche','AdminController@getStatisticheSpecifiche')
        ->name('statisticheSpecifiche');

Route::view('/aggiungiStaf','newStaf')
        ->name('nuovoStaf');

Route::post('/newStaf','AdminController@newStaf')
        ->name('newStaf')->middleware('can:isAdmin');

Route::get('/eliminaStaf/{id}','AdminController@eliminaStaf')
        ->name('eliminaStaf')->middleware('can:isAdmin');

Route::get('/modificaStaf/{id}','AdminController@getModificaStaf')
        ->name('getModificaStaf')->middleware('can:isAdmin');

Route::post('/modificaStaf/{id}','AdminController@modificaStaf')
        ->name('modificaStaf')->middleware('can:isAdmin');


Route::get('/gestioneStaf','AdminController@getStaf')
        ->name('gestioneStaf');


// Staf routes



Route::post('/utente','StafController@visualizzaUtente')
        ->name('attivitaUtente');

Route::post('/blog','StafController@visualizzaBlog')
        ->name('cercaBlog');

