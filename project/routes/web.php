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

Route::get('/location', function(){
	return view('location');
})->middleware('auth');

Route::get('/quebec', function(){
	return view('quebec');
})->middleware('auth');
Route::get('/ontario', function(){
	return view('ontario');
})->middleware('auth');

Route::get('main',function(){
	return view('main');
})->middleware('auth');

Route::get('/profile/{username}', 'AuthController@show')->middleware('auth');



Route::get('register','AuthController@register');
Route::post('register','AuthController@store');
route::post('login','AuthController@authenticate');
route::post('province','AuthController@addProvince')->middleware('auth');
route::post('city','AuthController@addCity')->middleware('auth');



Route::get('payment','PaymentController@goToPaymentPage')->middleware('auth');
Route::post('paymentConfirmation','PaymentController@savePayment')->middleware('auth');

Route::get('paymentList', function () {
	if (Auth::user()->isAdmin){
    $details = DB::table('payment_management_system')->get();

    return view('payments_details', ['details' => $details]);
}else
{
	echo "Unauthorized";
}
})->middleware('auth');

Route::post('paymentList', 'PaymentController@backup')->middleware('auth');


Route::get('rentStore', function(){
	$stores = DB::table('physical_stores')->get();
	return view('rent_store',['stores'=> $stores]);

})->middleware('auth');
Route::post('rentStore','PhysicalStoreController@rent')->middleware('auth');
Route::get('addStore','PhysicalStoreController@index')->middleware('auth');
Route::post('saveStore', 'PhysicalStoreController@store')->middleware('auth');

