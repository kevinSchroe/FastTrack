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


Route::get('/', function () {

    return view('welcome');
});

Auth::routes();


Route::get('/welcome', 'HomeController@index')->name('welcome');
Route::get('/error', 'HomeController@error')->name('error');
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('/videos', 'HomeController@videos')->name('videos');
Route::get('/admin_dashboard', 'AdminController@index')->name('admin_dashboard');
Route::get('/testfragen', 'testfragencontroller@index')->name('testfragen');



Route::resource('/stammdaten', 'StammdatenController');
Route::resource('/fragenkatalog', 'FragenkatalogController');
Route::resource('/fahrlehrerVerwaltung', 'fahrlehrerVerwaltungController');



Route::get('testfragen/vorfahrt', 'testfragenController@Vorfahrt');
Route::post('testfragen/vorfahrt', 'testfragenController@subpage');
Route::get('testfragen/umwelt', 'testfragenController@Umwelt');
Route::get('testfragen/technik', 'testfragenController@Technik');
