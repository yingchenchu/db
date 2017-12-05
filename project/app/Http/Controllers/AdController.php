<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use date;
use DB;
use Auth;
class AdController extends Controller
{

    protected $table = "ads";
    public function CreateAd(Request $request)
    {
        //$user = DB::table('users')->where('user_name','=',$user_name)->get();
        $user_id        = Auth::user()->id;
        $ad_name        = $request->input('name');
        $category       = $request->input('category');
        $store_type     = $request->input('store_type');
        $product        = $request->input('product');
        $description    = $request->input('description');
        $saleby         = $request->input('saleby');
        $price          = $request->input('price');
        $post_date      = new DateTime('now');
        $expire_date    = new DateTime('now'); //$user->'user_id'; //need to change based on the user's membership, ask yc
        $email          = $request->input('email');
        $phonenumber    = $request->input('phonenumber');
        $address        = $request->input('address');
        $province        = $request->input('province');
        $city        = $request->input('city');




        $values = array(
            'user_id'       => $user_id, 
            'ad_name'       => $ad_name,
            'category'      => $category,
            'product'       => $product,
            'store_type'    => $store_type,
            'description'   => $description,
            'saleby'        => $saleby,
            'price'         => $price,
            'rank'          => '0',
            'expire_rank'   => $post_date,
            'post_date'     => $post_date,
            'expire_date'   => $expire_date,
            'email'         => $email,
            'phonenumber'   => $phonenumber,
            'address'       => $address,
            'province'      => $province,
            'city'          => $city);

        DB::table('ads')->insert($values);
        $ad = DB::table('ads')->orderBy('ad_id', 'desc')->first();
       return view('show_ad', ['ad' => $ad]);
    }

     public function showAllAds()
    {
        $ads = DB::table('ads')->where('province', Auth::user()->province)
                                ->where('city', Auth::user()->city)
                                ->orderBy('ad_id', 'desc')
                                ->orderBy('rank', 'desc')->get();
        if( !is_null($ads))
        {
            return view('showAds', compact('ads'));
        }
        else
        {
            return view('showAds');
        }
    }

    public function SearchedAds(Request $request)
    {
        $category   = $request->input('category');
        $product    = $request->input('product');
        $user_name  = $request->input('user_name');
        // DB:.. select from ads where product = $product. 
        //for loop, display all these ads

        if(empty($category) && empty($product) && empty($user_name))
        {
            $ads = DB::table('ads')->get();
            if( !is_null($ads))
            {
                return view('showAds', compact('ads'));
            }
            else
            {
                return view('showAds');
            }
        }
        else if (empty($category) && empty($product) && !empty($user_name)) //001
        {
            $user_id = DB::table('users')->where('username', $user_name)->pluck('id');
            $ads = DB::table('ads')
                    ->where('user_id', $user_id)
                    ->get();
            if( !is_null($ads))
            {   
                return view('showAds', compact('ads'));
            }
            else
            {
                return view('showAds');
            }
        }
        else if (empty($category) && !empty($product) && empty($user_name))//010
        {
            $ads = DB::table('ads')
                    ->where('product', $product)
                    ->get();
            if( !is_null($ads))
            {   
                return view('showAds', compact('ads'));
            }
            else
            {
                return view('showAds');
            }
        }
        else if (empty($category) && !empty($product) && !empty($user_name))//011
        {
            $user_id = DB::table('users')->where('username', $user_name)->pluck('id');
            $ads = DB::table('ads')
                    ->where('user_id', $user_id)
                    ->where('product', $product)
                    ->get();
            if( !is_null($ads))
            {   
                return view('showAds', compact('ads'));
            }
            else
            {
                return view('showAds');
            }
        }
        else if (!empty($category) && empty($product) && empty($user_name)) //100
        {
            $ads = DB::table('ads')
                    ->where('category', $category)
                    ->get();
            if( !is_null($ads))
            {   
                return view('showAds', compact('ads'));
            }
            else
            {
                return view('showAds');
            }
        }
        else if (!empty($category) && empty($product) && !empty($user_name)) //101
        {
            $user_id = DB::table('users')->where('username', $user_name)->pluck('id');
            $ads = DB::table('ads')
                    ->where('user_id', $user_id)
                    ->where('category', $category)
                    ->get();
            if( !is_null($ads))
            {   
                return view('showAds', compact('ads'));
            }
            else
            {
                return view('showAds');
            }
        }
        else if (!empty($category) && !empty($product) && empty($user_name)) //110
        {
            $ads = DB::table('ads')
                    ->where('product', $product)
                    ->where('category', $category)
                    ->get();
            if( !is_null($ads))
            {   
                return view('showAds', compact('ads'));
            }
            else
            {
                return view('showAds');
            }
        }
        else //111
        {
            $user_id = DB::table('users')->where('username', $user_name)->pluck('id');
            $ads = DB::table('ads')
                    ->where('user_id', $user_id)
                    ->where('product', $product)
                    ->where('category', $category)
                    ->get();
            if( !is_null($ads))
            {   
                return view('showAds', compact('ads'));
            }
            else
            {
                return view('showAds');
            }
        }
    }

    public function showAdInfo($id)
    {
        $ad = DB::table('ads')->where('ad_id', $id)->first();
        return view('show_ad', ['ad' => $ad]); 
    }

    public function myads(){
        if(Auth::user()->isadmin === "0")
        {
            $ads = DB::table('ads')->where('user_id', Auth::user()->id)->orderBy('rank', 'desc')->get();
            if( !is_null($ads))
            {
                return view('MyAds', compact('ads'));
            }
            else
            {
                return view('MyAds');
            }
        }
        else
        {
            $ads = DB::table('ads')->orderBy('rank', 'desc')->get();
            if( !is_null($ads))
            {
                return view('MyAds', compact('ads'));
            }
            else
            {
                return view('MyAds');
            }
        }
    }

    public function EditAd($id)
    {
        $ad = DB::table('ads')->where('ad_id', $id)->first();
        return view('edit_ad', ['ad' => $ad]); 
    }

    public function SaveChanges($id, Request $request){
        DB::table('ads')->where('ad_id', $id)->update(array(
            'ad_name'       => $request->input('ad_name'),
            'category'      => $request->input('category'),
            'product'       => $request->input('product'),
            'store_type'    => $request->input('store_type'),
            'description'   => $request->input('description'),
            'saleby'        => $request->input('saleby'),
            'price'         => $request->input('price'),
            'email'         => $request->input('email'),
            'phonenumber'   => $request->input('phonenumber'),
            'address'       => $request->input('address'),
            'province'      => $request->input('province'),
            'city'          => $request->input('city')
        ));
        $ad = DB::table('ads')->where('ad_id', $id)->first();
        return view('show_ad', ['ad' => $ad]); 
    }

    public function DeleteAd($id)
    {
        DB::table('ads')->where('ad_id', $id)->delete();
        $ads = DB::table('ads')->where('user_id', Auth::user()->id)->orderBy('rank', 'desc')->get();
        if( !is_null($ads))
        {
            return view('MyAds', compact('ads'));
        }
        else
        {
            return view('MyAds');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
