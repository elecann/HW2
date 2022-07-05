<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ApiController;

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
    return redirect('welcome');
});
Route::get('welcome','App\Http\Controllers\LoginController@welcome');

Route::get('register','App\Http\Controllers\LoginController@register_form');
Route::post('register', 'App\Http\Controllers\LoginController@do_register');
Route::get('checknickname/{value}', 'App\Http\Controllers\LoginController@checknickname');
Route::get('checkemail/{value}', 'App\Http\Controllers\LoginController@checkemail');

Route::get('login','App\Http\Controllers\LoginController@login_form')->name("login");
Route::post('login', 'App\Http\Controllers\LoginController@do_login');
// Route::get('checknickname/{value}', 'App\Http\Controllers\LoginController@checknickname');
// Route::get('checkpassword/{nome}/{pass}', 'App\Http\Controllers\LoginController@checkpassword');
Route::get('logout','App\Http\Controllers\LoginController@logout');

Route::get('home', 'App\Http\Controllers\CollectionController@home');

Route::get('profilo', 'App\Http\Controllers\CollectionController@profilo');
Route::get('contenuti', 'App\Http\Controllers\CollectionController@contenuti');
Route::get('prefe', 'App\Http\Controllers\CollectionController@prefe');

Route::post('impostala', 'App\Http\Controllers\CollectionController@impostala')->name('impostala');
Route::get('rimuovi/{id}', 'App\Http\Controllers\CollectionController@rimuovi');
Route::get('porfavor', 'App\Http\Controllers\CollectionController@porfavor');


Route::get('api', 'App\Http\Controllers\ApiController@api');
Route::get('cerca/{ricerca}', 'App\Http\Controllers\ApiController@cerca');
Route::post('inserisci', 'App\Http\Controllers\ApiController@inserisci');
Route::post('preferiti', 'App\Http\Controllers\ApiController@preferiti');
Route::post('verifico', 'App\Http\Controllers\ApiController@verifico');
Route::post('remove', 'App\Http\Controllers\ApiController@remove');

Route::get('cercali', 'App\Http\Controllers\ProfiloController@cercali');
Route::get('porfavor/{nickname}', 'App\Http\Controllers\ProfiloController@porfavor');
Route::get('cercapost/{nome}', 'App\Http\Controllers\ProfiloController@cercapost');
