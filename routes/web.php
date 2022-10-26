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

Route::get('/user', 'UserController@home')
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

//Profilo utente

Route::view('/myProfilo','profilo')
        ->name('profilo')->middleware('can:isUser');

Route::get('/myProfilo/modificaProfilo', 'UserController@getmodificaProfilo')
        ->name('modificaProfilo')->middleware('can:isUser');

Route::post('/myProfilo/modificaProfilo', 'UserController@modificaProfilo')
        ->name('modificaProfilo');

Route::get('/myProfilo/modificaProfilo/modificaPassword', 'UserController@getmodificaPassword')
        ->name('getmodificaUserPassword')->middleware('can:isUser');

Route::post('/myProfilo/modificaProfilo/modificaPassword', 'UserController@modificaPassword')
        ->name('modificaUserPassword');

//Creazione , visualizzazione , eliminazione e modifica blog dell'utente loggato

Route::view('/blog/nuovoBlog', 'newBlog')
        ->name('newBlog')->middleware('can:isUser');

Route::post('/blog/nuovoBlog','UserController@newBlog')
        ->name('newBlog')->middleware('can:isUser');

Route::get('/iMieiBlog','UserController@getMyBlogs')
        ->name('myBlogs')->middleware('can:isUser');

Route::get('/blog/{id}','UserController@getBlog')
        ->name('getBlog')->middleware('can:isUser');

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

 Route::get('/notifiche/novitàBlog/{id}', 'UserController@blogCambiato')
        ->name('novitaBlog')->middleware('can:isUser');
        
       
Route::get('/notifiche/elimina/{notifica}','UserController@eliminaNotifica')
        ->name('eliminaNotifica');

Route::get('/notifiche/archivia/{notifica}','UserController@archiviaNotifica')
        ->name('archiviaNotifica');

//Visualizzazione, elimina  amici

Route::get('/amici','UserController@getAmici')
        ->name('amici')->middleware('can:isUser');

Route::get('/amico/{idamico}/{idamicizia}','UserController@getProfiloAmico')
                ->name('getAmico');

Route::post('/amici/elimina','UserController@eliminaAmico')
        ->name('eliminaAmico');


Route::get('/amici/risposta/{id}/{risposta}','UserController@rispostaAmicizia')
        ->name('rispostaAmicizia');

//Creazione post , visualizzazione  blog

Route::post('/blogUtente/nuvoPost/{id}','UserController@newPost')
        ->name('newPost')->middleware('can:isUser');

Route::get('/blogUtente/{id}','UserController@getBlog')
        ->name('blog')->middleware('can:isUser');

//Ricerca utenti e invio amicizia

Route::get('/ricercaAmici','UserController@searchFriends')
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
        ->name('gestioneStaf')->middleware('can:isAdmin');

Route::view('/gestioneStaf/aggiungiStaf','newStaf')
        ->name('nuovoStaf')->middleware('can:isAdmin');

Route::post('/gestioneStaf/aggiungiStaf','AdminController@newStaf')
        ->name('creaStaf')->middleware('can:isAdmin');

Route::post('/gestioneStaf/elimina','AdminController@eliminaStaf')
        ->name('eliminaStaf')->middleware('can:isAdmin');

Route::get('/gestioneStaf/modificaStaf/{id}','AdminController@getModificaStaf')
        ->name('getModificaStaf')->middleware('can:isAdmin');

Route::post('/gestioneStaf/modificaStaf/{id}','AdminController@modificaStaf')
        ->name('modificaStaf')->middleware('can:isAdmin');

Route::get('/gestioneStaf/modificaStaf/modificaPassword/{id}','AdminController@getModificaPassword')
        ->name('getModificaStaffPassword')->middleware('can:isAdmin');

Route::post('/gestioneStaf/modificaStaf/modificaPassword/{id}','AdminController@modificaPassword')
        ->name('modificaStaffPassword')->middleware('can:isAdmin');





// Staf e admin routes

Route::view('/ricerca','ricercaUtenteBlog')
        ->name('ricerca')->middleware('can:isGestore');

Route::get('/ricerca/blog/elimina/{id}','StafController@inserisciMotivoBlog')
        ->name('inserisciMotivoBlog')->middleware('can:isGestore');

Route::post('/ricerca/eliminaBlog/{id}','StafController@deleteBlog')
        ->name('eliminaBlogGestore')->middleware('can:isGestore');

Route::get('/ricerca/post/elimina/{id}/{idBlog}','StafController@inserisciMotivoPost')
        ->name('inserisciMotivoPost')->middleware('can:isGestore');

Route::post('/ricerca/eliminaPost/{id}','StafController@deletePost')
        ->name('eliminaPostGestore')->middleware('can:isGestore');

Route::get('/cercaUtente','StafController@visualizzaUtente')
        ->name('attivitaUtente');

Route::get('/ricercaBlog','StafController@visualizzaBlog')
        ->name('cercaBlog');






