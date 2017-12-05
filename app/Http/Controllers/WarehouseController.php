<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
class WarehouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['warehouses'] = DB::table('warehouses')
            ->where('active', 1)
            ->orderBy('name')
            ->paginate(12);
        return view('warehouses.index', $data);
    }
    public function create()
    {
        return view('warehouses.create');
    }
    public function save(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'address' => $r->address
        );
        $i = DB::table('warehouses')->insert($data);
        if($i)
        {
            $r->session()->flash('sms', "New warehouse as been created successfully!");
            return redirect('/warehouse/create');
        }
        else{
            $r->session()->flash('sms1', "Fail to create new warehouse!");
            return redirect('/warehouse/create')->withInput();
        }
    }
    public function edit($id)
    {
        $data['warehouse'] = DB::table('warehouses')->where('id', $id)->first();
        return view('warehouses.edit', $data);
    }
    public function update(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'address' => $r->address
        );
        $i = DB::table('warehouses')->where('id', $r->id)->update($data);
        if($i)
        {
            $r->session()->flash('sms', "All change has been saved!");
            return redirect('/warehouse/edit/'.$r->id);
        }
        return redirect('/warehouse/edit/'.$r->id);
    }
    public function delete($id)
    {
        $i = DB::table('warehouses')->where('id', $id)->update(['active'=>0]);
        return redirect('/warehouse');
    }
}
