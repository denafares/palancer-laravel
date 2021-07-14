<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\Admin\CategoryController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::view('/','welcome');
//Route::get('/dashboard','DashboardController@index');


Route::group([
    'prefix'=>'Admin/category',
    'namespace'=>'Admin',
    'as'=>'Admin.category.',


],function(){

Route::get('/dashboard',[DashboardController::class,'index']);
Route::get('/create','CategoryController@create')->name('create');
Route::get('/index','CategoryController@index')->name('index');
Route::get('/{id}','CategoryController@show')->name('show');
Route::get('/create','CategoryController@create')->name('create');
Route::post('/create','CategoryController@store')->name('store');

Route::get('/{id}/Edit','CategoryController@Edit')->name('Edit');
Route::PUT('/{id}',[CategoryController::class,'update'])->name('update');
Route::delete('/{id}',[CategoryController::class,'destroy'])->name('destroy');

});

/*Route::resource('Admin/category','Admin\CategoryController');*/