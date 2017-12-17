<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
