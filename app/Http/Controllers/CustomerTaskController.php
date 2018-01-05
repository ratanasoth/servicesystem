<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class CustomerTaskController extends Controller
{
    // index
    public function index(Request $r)
    {
        $q = $r->q;
        $customer = $r->session()->get('customer');
        if($customer==NULL)
        {
            return redirect('/customerlogin');
        }
        if($q)
        {
            $data['q'] = $q;
            $data['tasks'] = DB::table('tasks')
                ->where('active',1)
                ->where('customer_id', $customer->id)
                ->where(function($query) use ($q) {
                    $query->orWhere('title', 'like', "%{$q}%")
                        ->orWhere('description', 'like', "%{$q}%")
                        ->orWhere('severity', 'like', "%{$q}%")
                        ->orWhere('progression', 'like', "%{$q}%")
                        ->orWhere('deadline', 'like', "%{$q}%");
                })
                ->orderBy('id', 'desc')
                ->paginate(22);
            return view('fronts.tasks.index', $data);
        }
        else{
            $data['q'] = "";
            $data['tasks'] = DB::table('tasks')
                ->where('active',1)
                ->where('customer_id', $customer->id)
                ->orderBy('id', 'desc')
                ->paginate(22);
            return view('fronts.tasks.index', $data);
        }
    }
    public function detail(Request $r)
    {
        $customer = $r->session()->get('customer');
        if($customer==NULL)
        {
            return redirect('/customerlogin');
        }
        $data['task'] = DB::table('tasks')
            ->leftJoin('users', 'tasks.handler', 'users.id')
            ->where('tasks.id', $r->id)
            ->select('tasks.*', 'users.first_name', 'users.last_name')
            ->first();
        return view('fronts.tasks.detail', $data);
    }
}
