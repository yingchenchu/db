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


/////////////Ads/////////////////////
//Create ads
/*Route::get('/createads', functon (){
	return view('create_ads');
});*/

Route::get('profile/createAd','AdController@goToCreateAd');
Route::post('AdCreation','AdController@CreateAd');

/*
//View my ads
Route::post('/myads', function (){
	return view('my_ads');
});

//View current ads
Route::post('currentads', function (){
	return view('current_ads');
});
*/
//View details of the chosen ad //?????????????????????????????????????
/*Route::post('', function (){
	return view('chosen_ad');
});*/