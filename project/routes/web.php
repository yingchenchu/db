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
/******************VINH***********************************/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile/{username}/createAd', function(){
    return view('create_ad');
});
Route::post('/profile/ReviewAd', 'AdController@CreateAd');


Route::get('/profile/{username}/MyAds','AdController@myads'); //History Ads

Route::get('/AllAds','AdController@showAllAds');
Route::get('/AllAds/Search','AdController@SearchedAds');

Route::get('ChosenAd/{id}', 'AdController@showAdInfo');
Route::get('Edit/{id}', 'AdController@EditAd');
Route::get('/SaveChange/{id}', 'AdController@SaveChanges');

Route::get('Delete/{id}', 'AdController@DeleteAd');


/************************YC***********************************/
Route::get('ad_{id}/promotion_package', 'PromotionPackageController@displayPromotionPackages')->middleware('auth');
Route::get('ad_{id}/promo_package_{promo_id}/payment','PaymentController@goToPaymentPage')->middleware('auth');

Route::get('ad_{id}/payment','PaymentController@goToPaymentPage')->middleware('auth');

Route::post('/ad_{ad_id}/submitRating', 'PaymentController@submitRating');
//for the payment system
//for ad 
Route::post('ad_{ad_id}/paymentConfirmation','PaymentController@savePaymentAd')->middleware('auth');
//for promo pack bought for an ad
Route::post('ad_{ad_id}/promo_{promo_name}/paymentConfirmation','PaymentController@savePaymentPromoPack')->middleware('auth');
//for membership plan for a user
Route::post('user_{user_id}/membership_{membership_name}/paymentConfirmation','PaymentController@savePaymentMembership')->middleware('auth');

Route::get('profile_{user_id}/membership', 'MembershipPlanController@displayMemberships')->middleware('auth');
Route::get('profile_{user_id}/membership/payment','PaymentController@goToPaymentPage')->middleware('auth');

/*******************ALEX************************/

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

Route::get('paymentList', function () {
	if (Auth::user()->isadmin){
    $details = DB::table('payments')->get();

    return view('payments_details', ['details' => $details]);
}else
{
	echo "Unauthorized";
}
})->middleware('auth');

Route::post('paymentList', 'PaymentController@backup')->middleware('auth');

Route::get('/main/reports',function(){
	return view('reports');
})->middleware('auth');


Route::get('rentStore', function(){
	$stores = DB::table('physical_stores')->get();
	return view('rent_store',['stores'=> $stores]);

})->middleware('auth');
Route::post('rentStore','PhysicalStoreController@rent')->middleware('auth');
Route::get('addStore','PhysicalStoreController@index')->middleware('auth');
Route::post('saveStore', 'PhysicalStoreController@store')->middleware('auth');

