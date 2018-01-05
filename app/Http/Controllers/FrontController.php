<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class FrontController extends Controller
{
    //
    public function index(){
    	return view('fronts.index');
    }

    public function customerlogin(){
    	return view('fronts.customerlogin');
    }

    public function stafflogin(){
    	return view('fronts.stafflogin');
    }
    // customer do login
    public function dologin(Request $r)
    {
        $username = $r->username;
        $pass = $r->password;
        $user = DB::table('customers')->where('active',1)->where('username', $username)->first();
        if($user!=null)
        {
            if(password_verify($pass, $user->password))
            {
                // save user to session
                $r->session()->put('customer', $user);
                return redirect('/front/customer');
            }
            else{

                $r->session()->flash('sms1', "Invalid username or password. Try again!");
                return redirect('/customerlogin')->withInput();
            }
        }
        else{
            $r->session()->flash('sms1', "Invalid username or password. Try again!");
            return redirect('/customerlogin')->withInput();
        }
    }
    // customer logout
    public function logout(Request $request)
    {
        $request->session()->forget('customer');
        $request->session()->flush();
        return redirect('/customerlogin');
    }
}
