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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('role-user', 'RoleUserController')->only(['store']);
Route::resource('mail-user', 'MailUserController')->only(['store']);
Route::resource('users', 'UserController')->only(['index', 'show']);
Route::resource('mails', 'MailController')->only(['index', 'create', 'store', 'edit', 'update', 'show']);
Route::resource('roles', 'RoleController')->only(['index','store']);
