<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
class AssetTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['asset_types'] = DB::table('asset_types')
            ->where('active', 1)
            ->orderBy('name')
            ->paginate(12);
        return view('asset-types.index', $data);
    }
    public function create()
    {
        return view('asset-types.create');
    }
    public function save(Request $r)
    {
        $data = array(
            'name' => $r->name
        );
        $i = DB::table('asset_types')->insert($data);
        if($i)
        {
            $r->session()->flash('sms', "New asset type has been created successfully!");
            return redirect('/asset-type/create');
        }
        else{
            $r->session()->flash('sms1', "Fail to create new asset type!");
            return redirect('/asset-type/create')->withInput();
        }
    }
    public function edit($id)
    {
        $data['asset_type'] = DB::table('asset_types')->where('id', $id)->first();
        return view('asset-types.edit', $data);
    }
    public function update(Request $r)
    {
        $data = array(
            'name' => $r->name
        );
        $i = DB::table('asset_types')->where('id', $r->id)->update($data);
        if($i)
        {
            $r->session()->flash('sms', "All change has been saved!");
            return redirect('/asset-type/edit/'.$r->id);
        }
        return redirect('/asset-type/edit/'.$r->id);
    }
    public function delete($id)
    {
        $i = DB::table('asset_types')->where('id', $id)->update(['active'=>0]);
        return redirect('/asset-type');
    }
}
