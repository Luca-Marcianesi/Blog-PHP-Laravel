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

Route::view('/', 'home')
        ->name('home');

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

//Ptofilo utente

Route::view('/myProfilo','profilo')
        ->name('profilo')->middleware('can:isUser');

Route::post('/myProfilo/modificaProfilo', 'UserController@modificaProfilo')
        ->name('modificaProfilo');

//Creazione , visualizzazione , eliminazione e modifica blog dell'utente loggato

Route::view('/blog/nuovoBlog', 'newBlog')
        ->name('newBlog')->middleware('can:isUser');

Route::post('/blog/nuovoBlog','UserController@newBlog')
        ->name('newBlog')->middleware('can:isUser');

Route::get('/blog/iMieiBlog','UserController@getMyBlogs')
        ->name('myBlogs')->middleware('can:isUser');

Route::post('/blog/modificaBlog/{id}','UserController@modificaBlog')
        ->name('modificaBlog')->middleware('can:isUser');

Route::get('/blog/selezionaAmici/{id}', 'UserController@selezionaAmici')
        ->name('selezionaAmici');

Route::post('/blog/eliminaBlog', 'UserController@eliminaBlog')
        ->name('eliminaBlog');

Route::get('/blog/accesso/{blogId}/{userId}/{stato}', 'UserController@setAccesso')
        ->name('setAccesso');

// Visualizzazione, elimina e archivia notifiche

Route::get('/notifiche', 'UserController@getNotifiche')
        ->name('notifiche')->middleware('can:isUser');

Route::get('/notifiche/elimina/{notifica}','UserController@eliminaNotifica')
        ->name('eliminaNotifica');

Route::get('/notifiche/archivia/{notifica}','UserController@archiviaNotifica')
        ->name('archiviaNotifica');

//Visualizzazione, elimina  amici

Route::get('/amici','UserController@getAmici')
        ->name('amici')->middleware('can:isUser');

Route::get('/amici/elimina/{id_amicizia}/{user_id}','UserController@eliminaAmico')
        ->name('eliminaAmico');

Route::get('/amici/risposta/{id}/{risposta}','UserController@rispostaAmicizia')
        ->name('rispostaAmicizia');

//Creazione post , visualizzazione  blog

Route::post('/blogUtente/nuvoPost/{id}','UserController@newPost')
        ->name('newPost')->middleware('can:isUser');

Route::get('/blogUtente/{id}','UserController@getBlog')
        ->name('blog')->middleware('can:isUser');

//Ricerca utenti e invio amicizia

Route::post('/ricerca','UserController@searchFriends')
        ->name('searchFriends')->middleware('can:isUser');

Route::get('/ricerca/profiloUtente/{id}', 'UserController@getProfilo')
        ->name('visualizzaProfilo');

Route::get('/aggiungiAmico/{id}', 'UserController@amicizia')
        ->name('inviaAmicizia');







// Admin routes

//Statistiche

Route::get('/statistiche','AdminController@getMainStatistiche')
        ->name('statistiche');

Route::post('/statistiche/utente','AdminController@getStatisticheSpecifiche')
        ->name('statisticheSpecifiche');

//Aggiungi , modifica , elimina staff

Route::get('/gestioneStaf','AdminController@getStaf')
        ->name('gestioneStaf');

Route::view('/gestioneStaf/aggiungiStaf','newStaf')
        ->name('nuovoStaf');

Route::post('/gestioneStaf/aggiungiStaf','AdminController@newStaf')
        ->name('creaStaf')->middleware('can:isAdmin');

Route::get('/gestioneStaf/eliminaStaf/{id}','AdminController@eliminaStaf')
        ->name('eliminaStaf')->middleware('can:isAdmin');

Route::get('/gestioneStaf/modificaStaf/{id}','AdminController@getModificaStaf')
        ->name('getModificaStaf')->middleware('can:isAdmin');

Route::post('/gestioneStaf/modificaStaf/{id}','AdminController@modificaStaf')
        ->name('modificaStaf')->middleware('can:isAdmin');

Route::view('/ricerca','ricercaUtenteBlog')
        ->name('ricerca')->middleware('can:isGestore');




// Staf e admin routes

Route::post('/ricerca/eliminaBlog/{$id}','StafController@deleteBlog')
        ->name('eliminaBlogGestore')->middleware('can:isGestore');



Route::post('/utente','StafController@visualizzaUtente')
        ->name('attivitaUtente');

Route::post('/blog','StafController@visualizzaBlog')
        ->name('cercaBlog');



