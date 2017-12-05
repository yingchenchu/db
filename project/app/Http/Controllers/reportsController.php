<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class reportsController extends Controller
{

	public function user_per_category()
	{
		DB::select(DB::raw('Select id, count(category) from ads group by category;'));

	}

	public function quebec_user_info()
	{
		DB::select(DB::raw('Select email, address from ads where province=”quebec”, and product=”winter men’s jacket”;'));
	}

	public function delivery_services()
	{
		DB::select(DB::raw('Select SUM(delivery_cost) from store_by_sellers where rent_date= DATE(NOW()) + -7 DAY and rent_date = DATE(NOW()) + 7 DAY;'))
		
	}

    //
}
