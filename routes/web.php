<?php

use Illuminate\Support\Facades\Auth;
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

// Route::domain('{account}.myapp.com')->group(function () {
// Route::domain('minha.laravel-modulos.test')->group(function () {
//     Route::get('/', function ($account, $id) {
//         return 'foi';
//     });
// });

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/login_safety', 'Auth\SuperSafetyController@login')->name('loginsupersafety');
Route::post('/super_safety', 'Auth\SuperSafetyController@super_safety')->name('supersafety');

Auth::routes();