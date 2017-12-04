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
Route::get('profile_{user_id}/membership', 'MembershipPlanController@displayMemberships');
Route::get('profile_{user_id}/membership/payment','PaymentController@goToPaymentPage');


//for buying promotion package page for a specific ad
// Route::get('/adID/promotion_package',function(){
//    return view('promotion_package');
// });

Route::get('ad_{id}/promotion_package', 'PromotionPackageController@displayPromotionPackages');
Route::get('ad_{id}/promo_package_{promo_id}/payment','PaymentController@goToPaymentPage');

Route::get('ad_{id}/payment','PaymentController@goToPaymentPage');


//for the payment system
//for ad 
Route::post('ad_{ad_id}/paymentConfirmation','PaymentController@savePaymentAd');
//for promo pack bought for an ad
Route::post('ad_{ad_id}/promo_{promo_name}/paymentConfirmation','PaymentController@savePaymentPromoPack');
//for membership plan for a user
Route::post('user_{user_id}/membership_{membership_name}/paymentConfirmation','PaymentController@savePaymentMembership');


//submit rating for an item
// Route::post('submitRating','AdController@saveRating');

//for getting id from route
//https://stackoverflow.com/questions/33266316/laravel-5-getting-id-from-url
//ie
//Route::get('/ad/{id}', 'PaymentController@getAdId');

//Vinh's ads
Route::get('profile/createAd', function(){
    return view('create_ad');
});
Route::post('/profile/ReviewAd', 'AdController@CreateAd');


Route::get('profile/myAds','AdController@myAds'); //History Ads

Route::get('/AllAds','AdController@showAllAds');
Route::get('/AllAds/Search','AdController@SearchedAds');
//Route::post('ChosenAd','AdController@showAdInfo');

Route::get('ChosenAd/{id}', 'AdController@showAdInfo');
