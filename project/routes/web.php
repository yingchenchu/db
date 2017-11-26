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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});



Route::get('register','AuthController@register');
Route::post('registerConfirmation','AuthController@store');
route::post('main','AuthController@authenticate');

Route::get('payment','PaymentController@goToPaymentPage');
Route::post('paymentConfirmation','PaymentController@savePayment');

Route::get('paymentList', function () {

    $details = DB::table('payment_management_system')->get();

    return view('payments_details', ['details' => $details]);
});

Route::get('rentStore', function(){
	$stores = DB::table('physical_stores')->get();
	return view('rent_store',['stores'=> $stores]);

});
Route::get('addStore','PhysicalStoreController@index');
Route::post('saveStore', 'PhysicalStoreController@store');