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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/anasayfa', function () {
    return view('anasayfa');
});

Route::get('/kaydet/{sid}/{i}/{j}/{value}', 'islem@kaydet');

Route::get('/', 'islem@goster');

Route::get('/sayfagoster/{sid}', 'islem@sayfagoster');

Route::get('/sayfaekle/{sid}/{did}/{sname}', 'islem@sayfaekle');