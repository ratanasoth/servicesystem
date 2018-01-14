<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class AssetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // index
    public function index()
    {
    	$data['assets'] = DB::table("assets")
            ->Join('asset_types', 'assets.type_id', 'asset_types.id')
            ->Join('warehouses', 'assets.warehouse_id', 'warehouses.id')
            ->where("assets.active",1)
            ->orderBy("assets.name")
            ->select('assets.*', 'asset_types.name as type_name' , 'warehouses.name as warehouse_name')
            ->paginate(12); 
    	
        return view("assets.index" , $data);
    }

    // create
    public function create()
    {
    	$data['asset_types'] = DB::table("asset_types")->where("active", 1)->get();
    	$data['warehouses'] = DB::table("warehouses")->where("active", 1)->get();
        return view("assets.create" , $data);
    }

    // insert
    public function save(Request $r)
    {
        $data = array(
            "name" => $r->name,
            "description" => $r->description,
            "type_id" => $r->type,
            "warehouse_id" => $r->warehouse,
            "onhand" => $r->onhand,
            'reference_code' => $r->reference,
            'total' => $r->total
        );
        $i = DB::table("assets")->insert($data);
        if($i)
        {
            $r->session()->flash("sms", "New asset has been saved successfully!");
            return redirect("/asset/create");
        }
        else{
            $r->session()->flash("sms1", "New asset has not been saved successfully!");
            return redirect("/asset/create")->withInput();
        }
    }

    // edit
    public function edit($id)
    {
        $data['assets'] = DB::table("assets")->where("id", $id)->first();
        $data['asset_types'] = DB::table("asset_types")->where("active", 1)->get();
    	$data['warehouses'] = DB::table("warehouses")->where("active", 1)->get();
        return view("assets.edit", $data);
    }

    // update
     public function update(Request $r)
     {
         $data = array(
             "name" => $r->name,
            "description" => $r->description,
            "type_id" => $r->type,
            "warehouse_id" => $r->warehouse,
            "onhand" => $r->onhand,
             'reference_code' => $r->reference,
             'total' => $r->total
         );
         $i = DB::table("assets")->where("id", $r->id)->update($data);
         if($i)
         {
             $r->session()->flash("sms", "Update successfully!");
             return redirect("/asset/edit/".$r->id);
         }
         else{
             $r->session()->flash("sms1", "Fail to save changes. You maynot change anything!");
             return redirect("/asset/edit/".$r->id);
         }
     }

     // delete
    public function delete($id)
    {
        $i = DB::table("assets")->where("id", $id)->update(["active"=>0]);
        $page = @$_GET['page'];
        if ($page>0)
        {
            return redirect('/asset?page='.$page);
        }
        return redirect('/asset');
    }
}
