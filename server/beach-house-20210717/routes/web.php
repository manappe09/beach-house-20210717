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
    return view('top');
}) -> name('top');

Route::get('/ice', function () {
    return view('ice');
}) -> name('ice');

Route::get('/menu', function () {
    return view('menu');
}) -> name('menu');

Route::get('/about', function () {
    return view('about');
}) -> name('about');

Route::get('/guide', function () {
    return view('guide');
}) -> name('guide');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello');
});