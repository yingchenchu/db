<?php

namespace App\Http\Controllers;

use View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use DB;

class AuthController extends Controller
{
    protected $currentUser;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function register()
    {
        return view('register');

    }
    public function index()
    {
        //
    }

    public function __construct(Guard $auth)
    {
        $this->currentUser = Auth::user();
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
        $username = $request->input('username');
        $password = password_hash($request->input('password'),PASSWORD_DEFAULT);


        $values = array('username'=>$username, 'password'=>$password,'isadmin'=>0);
        //$values = array('username'=>$username, 'password'=>$password, 'iadmin'=>1,'province'=>'QC','city'=>'montreal','membership_plan'=>1,'pacakge'=>1);
        DB::table('users')->insertGetId($values); //NEED TO ADD EXCPETION FOR DUPLICATE USERNAME >:-D

        return view('register_confirmation');
    }

    public function addCity(Request $request){
        $city = $request->input('city');


        $values = array('city'=>$city);
        DB::table('users')->where('id',Auth::user()->id)->update($values);

        return redirect()->intended('/main');
    }

    public function addProvince(Request $request){
        $province = $request->input('province');
        //$city = $request->input('city');


        

        $values = array('province'=>$province);
        DB::table('users')->where('id',Auth::user()->id)->update($values);

        if($province == "Quebec"){
            //return redirect()->intended('/quebec');
            return view('quebec');
        }else{
            //return redirect()->intended('/ontario');
            return view('ontario');
        }
    }

    public function authenticate(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if (Auth::attempt(['username' => $username, 'password' => $password])) {
           
            echo "Password valid";
            $user = Auth::user();
            //Auth::login($user);
            View::share('user', $user);
            $this->currentUser = Auth::user();

            // Authentication passed...
            echo Auth::user();
            
            return redirect()->intended('/location');
        }else
        {
            echo "Invalid Password or username";
        }

        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $user = DB::table('users')->where('username',$username)->first();
        return view('profile',['user'=> $user]);
        //return View::make('users.show', compact('user'));
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
