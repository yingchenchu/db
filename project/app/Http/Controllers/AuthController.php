<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class AuthController extends Controller
{
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

    public function authenticate(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');


        if (Auth::attempt(['username' => $username, 'password' => $password])) {
           
            echo "Password valid";
            // Authentication passed...
            echo Auth::user();
            
            //return redirect()->intended('/');
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
