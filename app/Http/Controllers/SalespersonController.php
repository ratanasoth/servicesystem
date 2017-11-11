<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class SalespersonController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    // index
    public function index()
    {
        $data['salespersons'] = DB::table("employees")
            ->where("position", "Salesperson")
            ->where('active',1)
            ->paginate(12);
        return view("salespersons.index", $data);
    }
}
