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
Route::get('/action', function () {
    return view('action');
});
Route::post('/create_film', function () {
    return view('create_movie');
});
Route::post('/create_session', function () {
    return view('create_session');
});
Route::post('/download', function () {
    return view('download');
});
Route::post('/create_ticket', function () {
    return view('create_ticket');
});
Route::get('/film', function () {
    return view('delete-film');
});
Route::get('/del-session', function () {
    return view('delete-session');
});
Route::get('/ticket', function () {
    return view('ticket');
});
Route::get('/ticket-d', function () {
    return view('delete-ticket');
});
Route::get('/', function () {
    return view('home-page');
});
Route::get('/admin', function () {
    return view('admin-page');
});
Route::get('/ticket-bron', function () {
    return view('ticket-bron');
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
Route::get('/movie', function () {
    return view('movie');
});
Route::get('/session', function () {
    return view('session');
});
Route::get('/admin/panel', function (Request $request) {
    //$value = $request->session()->get('admin');
    if(!($value = $request->session()->get('admin'))){
        return view('admin-page');
    }
    else{
        return view('auth-page');
    }    
});
// Route::post('/ticket/{id}/buy', 'App\Http\Controllers\Register@ticket', function($id){
//     return view()
// });
// Route::post('ticket/{id}/', 'App\Http\Controllers\Register@ticket');
// Route::get('/admin/auth', function (Request $request) {
//     $name = $request->input('name');
//     echo $name;
// });
Route::post('/admin/vhod', 'App\Http\Controllers\Register@edit');
Route::get('/admin/vhod', 'App\Http\Controllers\Register@edit');
Route::get('/admin/vhod/root', 'App\Http\Controllers\Register@show');
Route::get('/admin/vhod/root/report', 'App\Http\Controllers\Report@get_report');
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
