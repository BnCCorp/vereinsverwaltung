<?php

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

Route::get('/', 'PageController@index');
Route::resource('finance/category', 'FinanceCategoryController', ['as' => 'finance']);
Route::resource('finance/tag', 'FinanceTagController', ['as' => 'finance']);
Route::resource('finance/accounts', 'FinanceAccountController', ['as' => 'finance']);
Route::get('finance/transactions/bonus', 'FinanceTransactionController@bonus', ['as' => 'finance']);
Route::get('finance/transactions/garagerent', 'FinanceTransactionController@garagerent', ['as' => 'finance']);
Route::resource('finance/transactions', 'FinanceTransactionController', ['as' => 'finance']);
Route::resource('members', 'MemberController');
Route::resource('volunteerwork', 'VolunteerWorkController');