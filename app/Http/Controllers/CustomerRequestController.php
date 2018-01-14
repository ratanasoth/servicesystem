<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class CustomerRequestController extends Controller
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
            $data['requests'] = DB::table('requests')
                ->where('active',1)
                ->where('requester', $customer->id)
                ->where(function($query) use ($q) {
                    $query->orWhere('subject', 'like', "%{$q}%")
                    ->orWhere('description', 'like', "%{$q}%")
                    ->orWhere('request_date', 'like', "%{$q}%");
                })
                ->orderBy('id', 'desc')
                ->paginate(22);
            return view('fronts.requests.index', $data);
        }
        else{
            $data['q'] = "";
            $data['requests'] = DB::table('requests')
                ->where('active',1)
                ->where('requester', $customer->id)
                ->orderBy('id', 'desc')
                ->paginate(22);
            return view('fronts.requests.index', $data);
        }
       
    }
    public function create(Request $r)
    {
        $customer = $r->session()->get('customer');
        if($customer==NULL)
        {
            return redirect('/customerlogin');
        }
        return view('fronts.requests.create');
    }
    public function save(Request $r)
    {
        $customer = $r->session()->get('customer');
        if($customer==NULL)
        {
            return redirect('/customerlogin');
        }
        $date = date('Y-m-d');
        $data = array(
            'subject' => $r->subject,
            'requester' => $customer->id,
            'request_date' => $date,
            'description' => $r->description
        );
        $i = DB::table('requests')->insert($data);
        if($i)
        {
            $r->session()->flash('sms', "Your request has been created successfully!");
            return redirect('/customer/request/create');
        }
        else{
            $r->session()->flash('sms1', "Fail to create new request!");
            return redirect('/customer/request/create')->withInput();
        }
    }
    public  function edit(Request $r)
    {
        $customer = $r->session()->get('customer');
        if($customer==NULL)
        {
            return redirect('/customerlogin');
        }
        $id = $r->id;
        $data['customer'] = DB::table('requests')->where('id', $id)->first();
        return view('fronts.requests.edit', $data);
    }
    public function update(Request $r)
    {
        $customer = $r->session()->get('customer');
        if($customer==NULL)
        {
            return redirect('/customerlogin');
        }

        $data = array(
            'subject' => $r->subject,
            'description' => $r->description
        );
        $i = DB::table('requests')->where('id', $r->id)->update($data);
        if($i)
        {
            $r->session()->flash('sms', "All changes have been saved successfully!");
            return redirect('/customer/request/edit/'.$r->id);
        }
        else{
            $r->session()->flash('sms1', "Fail to save changes. You might not change anything!");
            return redirect('/customer/request/edit/'.$r->id);
        }
    }
    public function detail(Request $r)
    {
        $customer = $r->session()->get('customer');
        if($customer==NULL)
        {
            return redirect('/customerlogin');
        }
        $id = $r->id;
        $data['request'] = DB::table('requests')->where('id', $id)->first();
        return view('fronts.requests.detail', $data);
    }
    public function delete(Request $r)
    {
        $customer = $r->session()->get('customer');
        if($customer==NULL)
        {
            return redirect('/customerlogin');
        }
        $id = $r->id;
        $i = DB::table('requests')->where('id', $id)->update(['active'=>0]);     
        $r->session()->flash('sms', "Your request has been deleted successfully!");   
        return redirect('/customer/request');
    }
}
