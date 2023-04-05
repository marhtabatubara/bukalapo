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
Auth::routes([
    'register' => true,
    'reset' => true,
]);
// Auth::routes();

// Route::get('/', function () {
//     return view('auth.login');
// });
//guest
Route::get('/', 'GuestController@index');
Route::get('/indexinfodata', 'GuestController@indexinfodata');
Route::get('/indexcarousel', 'GuestController@indexcarousel');
Route::get('/detail-postingan/{title}','GuestController@fotoartikel')->name('foto.artikel');
Route::get('/detail-infodata/{title}','GuestController@fotoinfodata')->name('foto.infodata');
Route::get('/detail-carousel/{title}','GuestController@fotocarousel')->name('foto.carousel');
Route::get('/home', 'HomeController@index')->name('home');
//guest part2
Route::get('/guest-index','GuestController@gindex');
Route::get('/guest-artikel','GuestController@gartikel')->name('gartikel');
Route::get('/guest-tips','GuestController@gtips')->name('gtips');
Route::get('/guest-carousel','GuestController@gcarousel')->name('gcarousel');
Route::get('/guest-artikel1','GuestController@gartikel1')->name('gartikel1');

//postingan
Route::get('/postingan','PostinganController@index');
Route::get('/postingan/create','PostinganController@create')->name('postingan.create');
Route::post('/postingan','PostinganController@store')->name('postingan.store');
Route::get('/postingan/edit/{id}','PostinganController@edit')->name('postingan.edit');
Route::post('/postingan/update/{id}','PostinganController@update')->name('postingan.update');
Route::post('/postingan/delete/{id}','PostinganController@destroy')->name('postingan.destroy');

//artikel
Route::get('/artikel','ArtikelController@index');
Route::get('/artikel/create','ArtikelController@create')->name('artikel.create');
Route::post('/artikel','ArtikelController@store')->name('artikel.store');
Route::get('/artikel/edit/{id}','ArtikelController@edit')->name('artikel.edit');
Route::post('/artikel/update/{id}','ArtikelController@update')->name('artikel.update');
Route::post('/artikel/delete/{id}','ArtikelController@destroy')->name('artikel.destroy');

//infodata
Route::get('/infodata','InfodataController@index');
Route::get('/infodata/create','InfodataController@create')->name('infodata.create');
Route::post('infodata','InfodataController@store')->name('infodata.store');
Route::get('/infodata/edit/{id}','InfodataController@edit')->name('infodata.edit');
Route::post('/infodata/update/{id}','InfodataController@update')->name('infodata.update');
Route::post('/infodata/delete/{id}','InfodataController@destroy')->name('infodata.destroy');

//carousel
Route::get('/carousel','CarouselController@index');
Route::get('/carousel/create','CarouselController@create')->name('carousel.create');
Route::post('/carousel','CarouselController@store')->name('carousel.store');
Route::get('/carousel/edit/{id}','CarouselController@edit')->name('carousel.edit');
Route::post('/carousel/update/{id}','CarouselController@update')->name('carousel.update');
Route::post('/carousel/delete/{id}','CarouselController@destroy')->name('carousel.destroy');

//manajemen user
Route::get('/user','UserController@index');
Route::get('/user/create','UserController@create')->name('user.create');
Route::post('/user','UserController@store')->name('user.store');
Route::get('/user/edit/{id}','UserController@edit')->name('user.edit');
Route::post('/user/update/{id}','UserController@update')->name('user.update');
Route::post('/user/delete/{id}','UserController@destroy')->name('user.destroy');

