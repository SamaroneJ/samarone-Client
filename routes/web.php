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
//Route::apiResource('login','App\Http\Controllers\loginController');



Route::get('/inicio', function () {
    return view('inicio');
});
Route::get('/adm', function () {
    return view('tela_adm');
});
Route::get('/cid', function () {
    return view('tela_cid');
});
Route::get('/addUser', function () {
    return view('addUser');
});
Route::get('/addChamado', function () {
    return view('addChamado');
});

Route::get('/', function () {
    return view('welcome');
});


