<?php

use Illuminate\Support\Facades\Route;
use Modules\ModuleSuperSafety\Http\Middleware\SuperSafety;

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

Route::group(['prefix' => 'modulesupersafety', 'middleware' => [SuperSafety::class]], function () {
    Route::get('/', 'ModuleSuperSafetyController@index');
});