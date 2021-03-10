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

Route::get('/customers', 'HomeController@customers')->name('customers');



Route::group(['middleware' => 'user.role'], function () {

    Route::get('/payed/{id}', 'HomeController@markPayed');

Route::get('/searchInvoice', 'HomeController@searchInvoice')->name('searchInvoice');
Route::get('/searchCustomer', 'HomeController@searchCustomer')->name('searchCustomer');

Route::get('/searchInvoiceUnpayed', 'HomeController@searchInvoiceUnpayed')->name('searchInvoiceUnpayed');

Route::get('/statistics', 'HomeController@statistics')->name('statistics');

Route::get('/viewCustomer/{id}', 'HomeController@viewCustomer')->name('viewCustomer');

Route::get('/editCustomer/{id}', 'HomeController@editCustomer')->name('editCustomer');

Route::get('/unpayed', 'HomeController@unpayed')->name('unpayed');


Route::get('/addCustomer', 'HomeController@addCustomer')->name('addCustomer');

Route::post('/addCustomerForm', 'HomeController@addCustomerForm')->name('addCustomerForm');

Route::post('/saveEditCustomer/{id}', 'HomeController@saveEditCustomer')->name('saveEditCustomer');

Route::get('/viewInvoice/{id}/{invoiceId}', 'HomeController@viewInvoice')->name('viewInvoice');

Route::get('/downloadPDF/{id}/{invoiceId}', 'HomeController@downloadPDF')->name('downloadPDF');

Route::get('/viewCustomerCreateInvoice/{id}', 'HomeController@viewCustomerCreateInvoice')->name('viewCustomerCreateInvoice');

Route::post('/addInvoiceToCustomer/{id}', 'HomeController@addInvoiceToCustomer')->name('addInvoiceToCustomer');

Route::get('/editInvoice/{id}/{invoiceId}', 'HomeController@editInvoice')->name('editInvoice');

Route::post('/editInvoiceSave/{invoiceId}/{id}', 'HomeController@editInvoiceSave')->name('editInvoiceSave');

Route::get('globalCreateInvoice', 'HomeController@globalCreateInvoice')->name('globalCreateInvoice');

Route::get('/getCustomers', 'HomeController@getCustomers')->name('getCustomers');

Route::post('/createGlobalInvoice', 'HomeController@createGlobalInvoice')->name('createGlobalInvoice');

Route::get('/downloadConsent/{id}', 'HomeController@downloadConsent')->name('downloadConsent');
Route::get('/contract/{id}/{invoiceId}', 'HomeController@contract')->name('contract');

Route::get('/sendPDF/{id}/{invoiceId}', 'HomeController@sendPDF')->name('sendPDF');
});
