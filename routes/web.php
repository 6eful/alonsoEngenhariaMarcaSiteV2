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

Route::get('/', ['as'=>'welcome','uses'=>'User\UserController@index']);
Route::get('/login/logout', ['as'=>'login.logout','uses'=>'User\UserController@DoLogout']);
Route::post('/login/signin', ['as'=>'user.login.Signin','uses'=>'User\UserController@DoSignin']);

Route::group(['middleware'=>'auth'],function(){
  Route::get('/dashboard',['as'=>'user.homePanel', 'uses'=>'User\UserController@homePanel']);

  Route::get('/user',['as'=>'user.all', 'uses'=>'User\UserController@showusers']);
  Route::get('/user/create',['as'=>'user.create.index', 'uses'=>'User\UserController@createUsers']);
  Route::post('/user/save',['as'=>'user.save', 'uses'=>'User\UserController@salvarUsers']);
  Route::get('/user/edit/{id}',['as'=>'user.edit', 'uses'=>'User\UserController@editUsers']);
  Route::put('/user/atualizar/{id}',['as'=>'user.atualizar', 'uses'=>'User\UserController@updateUsers']);
  Route::get('/user/delete/{id}',['as'=>'user.delete', 'uses'=>'User\UserController@removeUsers']);

  Route::get('/customers',['as'=>'customer.all', 'uses'=>'User\CustomerController@showCustomer']);
  Route::get('/customer/create',['as'=>'customer.create.index', 'uses'=>'User\CustomerController@createCustomer']);
  Route::post('/customer/save',['as'=>'customer.save', 'uses'=>'User\CustomerController@salvarCustomer']);
  Route::get('/customer/edit/{id}',['as'=>'customer.edit', 'uses'=>'User\CustomerController@editCustomer']);
  Route::put('/customer/atualizar/{id}',['as'=>'customer.atualizar', 'uses'=>'User\CustomerController@updateCustomer']);
  Route::get('/customer/delete/{id}',['as'=>'customer.delete', 'uses'=>'User\CustomerController@removeCustomer']);
  Route::get('/customer/dados/{id}',['as'=>'customer.data', 'uses'=>'User\CustomerController@dataCustomer']);

  Route::get('/contract',['as'=>'contracts.all', 'uses'=>'User\ContractController@showContracts']);
  Route::get('/contract/create',['as'=>'contract.create.index', 'uses'=>'User\ContractController@createContract']);
  Route::post('/contract/save',['as'=>'contract.save', 'uses'=>'User\ContractController@salvarContract']);
  Route::get('/contract/edit/{id}',['as'=>'contract.edit', 'uses'=>'User\ContractController@editContract']);
  Route::put('/contract/atualizar/{id}',['as'=>'contract.atualizar', 'uses'=>'User\ContractController@updateContract']);
  Route::get('/contract/delete/{id}',['as'=>'contract.delete', 'uses'=>'User\ContractController@removeContract']);
  Route::get('/contract/export',['as'=>'contract.export', 'uses'=>'User\ContractController@exportContract']);
  Route::put('/contract/editar/status/{id}',['as'=>'contract.status.id', 'uses'=>'User\ContractController@editarStatusContract']);
});
