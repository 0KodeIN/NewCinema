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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('home-page');
});
Route::get('/admin', function () {
    return view('admin-page');
});
// Route::get('/projects', function () {
//     $projects = DB::connection('pgsql')->select('select * from movie');
//     return $projects;
// });
