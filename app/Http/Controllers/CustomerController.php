<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    // index
    public function index()
    {
        $data['customers'] = DB::table("customers")->where("active",1)->orderBy("first_name")
            ->paginate(12);

        return view("customers.index", $data);
    }
}
