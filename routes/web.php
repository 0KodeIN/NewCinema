<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Register;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;


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

Route::get('/test', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('home-page');
});
Route::get('/admin', function () {
    return view('admin-page');
});

// Route::post('/admin', function () {
//     DB::table('dispatcher')->insert(
//     ['dispatcher_id' => 105, 'login' => 'admin5', 'password' => 'qwe655']
//     );
//     return view('admin-page');
// });
Route::get('/detail/{id}/', function ($id) {
    return view('detail-page', compact('id'));
});
Route::get('/ticket/{id}/', function ($id) {
    return view('ticket-page', compact('id'));
});
// Route::get('/admin/auth', function (Request $request) {
//     $name = $request->input('name');
//     echo $name;
// });
Route::post('/admin/vhod', 'App\Http\Controllers\Register@edit');
Route::get('/admin/vhod', 'App\Http\Controllers\Register@edit');
// Route::prefix('admin')->group(function () {
//     Route::resource('crud', CrudController::class);
// });
// Route::resource('admin', LoginController::class);
// Route::match(['get','post'],'/admin',['uses'=>'LoginController@show','as'=>'login']);

// Route::get('admin', [LoginController::class, 'create'])
//     ->name('login');
// Route::post('admin/form', [LoginController::class, 'form']);
    // Route::post('admin', [LoginController::class, 'store']); 
// Route::get('/dashboard',function() {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
// require __DIR__.'/auth.php';
// Route::get('/admin/{id}/', 'App\Http\Controllers\Register@show');
// Route::get('/projects', function () {
//     $projects = DB::connection('pgsql')->select('select * from movie');
//     return $projects;
// });
