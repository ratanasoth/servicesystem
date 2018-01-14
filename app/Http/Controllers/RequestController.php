<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class RequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['requests'] = DB::table('requests')
            ->leftJoin('customers', 'requests.requester', 'customers.id')
            ->where('requests.active', 1)
            ->orderBy('requests.id', 'desc')
            ->select('requests.*', 'customers.first_name', 'customers.last_name')
            ->paginate(12);
        return view('requests.index', $data);
    }
    public function detail($id)
    {
        $data['request'] = DB::table('requests')
            ->leftJoin('customers', 'requests.requester', 'customers.id')
            ->where('requests.id', $id)
            ->select('requests.*', 'customers.first_name', 'customers.last_name')
            ->first();
        return view('requests.detail', $data);
    }
    public function delete($id)
    {
        DB::table('requests')->where('id', $id)->update(["active"=>0]);
        $page = @$_GET['page'];
        if ($page>0)
        {
            return redirect('/request?page='.$page);
        }
        return redirect('/request');
    }
}
