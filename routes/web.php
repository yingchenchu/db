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

Route::get('profile/createAd', function(){
    return view('create_ad');
});
Route::post('profile/showAd','AdController@CreateAd');

Route::get('/AllAds','AdController@showAllAds');
//Route::post('ChosenAd','AdController@showAdInfo');

Route::get('ChosenAd/{id}', 'AdController@showAdInfo');


/*
Route::get('ID/{id}',function($id){
   return view('welcome')->with('id', $id);
   //echo 'ID:'.$id;
});

//Route::post('showAd/{ad_id}','AdController@CreateAd');


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