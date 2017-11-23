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

// Route::resource('payments', 'PhotoController'); #['only' => ['index', 'show']

//for buying membership page for the specific user
Route::get('/profile/membership',function(){
   return view('membership');
});

//for buying promotion package page for a specific ad
Route::get('/adID/promotion_package',function(){
   return view('promotion_package');
});

//for the payment system
Route::get('payment','PaymentController@goToPaymentPage');
Route::post('paymentConfirmation','PaymentController@savePayment');

//submit rating for an item
// Route::post('submitRating','AdController@saveRating');

