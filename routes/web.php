<?php

use App\Http\Controllers\AdminController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('auth/login');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Multi User
Route::group(['middleware' => 'CheckRole:admin'], function(){
    //Route Admin
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboardadmin');
    Route::get('/userview', 'AdminController@userview')->name('userview');
    Route::get('/menuview', 'AdminController@menuview')->name('menuview');

    //Crud Employe
    Route::post('/register', 'AdminController@registerEmploye')->name('registeremploye');
    Route::post('/update/{id}', 'AdminController@editEmploye')->name('update');
    Route::get('/update/form/{id}', 'AdminController@showModalUpdate');
    Route::get('/delete/{id}', 'AdminController@deleteEmploye');

    //Crud Food
    Route::post('/addfood', 'AdminController@addFood')->name('addfood');
    Route::post('/updatefood/{id}', 'AdminController@editFood')->name('updatefood');
    Route::get('/updatefood/form/{id}', 'AdminController@modalUpdatedFood');
    Route::get('/deletefood/{id}', 'AdminController@deleteFood');
});

Route::group(['middleware' => 'CheckRole:kasir'],function(){
    //Route owner
    Route::get('/dashboardkasir','KasirController@dashboarkasir')->name('dashboardkasir');
    Route::get('/order', 'KasirController@orderview')->name('orderview');
    Route::get('/invoicemenu', 'KasirController@transaction')->name('invoiceview');
    //Crud Table menu
    Route::post('/cashier','KasirController@store');
    //PDF
    Route::get('/foods/pdf', 'KasirController@pdf')->name('invoicepdf');
});
