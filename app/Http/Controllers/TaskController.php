<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TaskController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }

    //this function is for show list of product
    public function index(Request $request)
    {
    	$data['tasks'] = DB::table("tasks")
    					->leftJoin('users', 'tasks.handler', 'users.id')
                        ->where('tasks.active', 1)
                        ->orderBy('tasks.id', 'desc')
                        ->select('tasks.*', 'users.first_name', 'users.last_name')
                        ->paginate(12);
        return view("tasks.index", $data);
    }

    //this function is for create new product
    public function create(Request $r)
    {
        $data['employees'] = DB::table('users')->where('active', 1)->orderBy('first_name')->get();
        $data['customers'] = DB::table('customers')->where('active', 1)->orderBy('first_name')->get();
        $data['severities'] = DB::table('severities')->get();
        return view("tasks.create", $data);
    }

    //This function is for insert data of one product
    public function save(Request $r)
    {
    	$data = array(
            "title" => $r->title,
            "severity" => $r->severity,
            "deadline" => $r->deadline,
            "handler" => $r->handler,
            "description" => $r->description,
            'customer_id' => $r->customer_id,
            'progression' => $r->progression
        );

        $i = DB::table("tasks")->insert($data);
        if ($i)
        {
            $r->session()->flash("sms", "New task has been created successfully!");
            return redirect("/task/create");
        }
        else{
            $r->session()->flash("sms1", "Fail to create new task!");
            return redirect("/task/create")->withInput();
        }
    }

    // load detail product info
    public function detail($id)
    {
        $data['task']= DB::table("tasks")
            ->leftJoin('users', 'tasks.handler', 'users.id')
            ->leftJoin('customers', 'tasks.customer_id', 'customers.id')
            ->where('tasks.id', $id)
            ->select('tasks.*', 'customers.first_name', 'customers.last_name',
                'users.first_name as fname', 'users.last_name as lname')
            ->first();
        return view("tasks.detail", $data);
    }

    //This function is for editting page of product
    public function edit($id)
    {

        $data['employees'] = DB::table('users')->where('active', 1)->orderBy('first_name')->get();
        $data['customers'] = DB::table('customers')->where('active', 1)->orderBy('first_name')->get();
        $data['severities'] = DB::table('severities')->get();
    	$data['task'] = DB::table("tasks")
    					->where("active", 1)
    					->where("id", $id)
    					->first();

    	return view("tasks.edit", $data);
    }

    //This function is for doing update product
    public function update(Request $r)
    {

        $data = array(
            "title" => $r->title,
            "severity" => $r->severity,
            "deadline" => $r->deadline,
            "handler" => $r->handler,
            "description" => $r->description,
            'customer_id' => $r->customer_id,
            'progression' => $r->progression
        );

        $i = DB::table("tasks")->where("id", $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash("sms", "All changes have saved successfully!");
            return redirect("/task/edit/". $r->id);
        }
        else{
            $r->session()->flash("sms1", "Fail to save change. You may not make any change!");
            return redirect("/task/edit/". $r->id);
        }
    }

    //this function is for deleting product
     public function delete($id)
    {
        DB::table('tasks')->where('id', $id)->update(["active"=>0]);
        $page = @$_GET['page'];
        if ($page>0)
        {
            return redirect('/task?page='.$page);
        }
        return redirect('/task');
    }
}
