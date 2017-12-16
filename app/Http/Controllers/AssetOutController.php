<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
class AssetOutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['asset_outs'] = DB::table('asset_outs')
            ->join('assets', 'asset_outs.asset_id', 'assets.id')
            ->join('users', 'asset_outs.out_by', 'users.id')
            ->select('asset_outs.*', 'assets.name', 'users.name as user_name')
            ->orderBy('asset_outs.id', 'desc')->paginate(12);
        return view('asset-outs.index', $data);
    }
    public function create()
    {
        $data['assets'] = DB::table('assets')->where('active',1)->orderBy('name')->get();
        $data['users'] = DB::table('users')->get();
        return view('asset-outs.create', $data);
    }
    public function detail($id)
    {
        $data['assets'] = DB::table('assets')->where('active',1)->orderBy('name')->get();
        $data['users'] = DB::table('users')->get();
        $data['asset_out'] = DB::table('asset_outs')->where('id', $id)->first();
        return view('asset-outs.detail', $data);
    }
    public function checkin($id)
    {
        $data['assets'] = DB::table('assets')->where('active',1)->orderBy('name')->get();
        $data['users'] = DB::table('users')->get();
        $data['asset_out'] = DB::table('asset_outs')->where('id', $id)->first();
        return view('asset-outs.checkin', $data);
    }
    public function save(Request $r)
    {
        $data = array(
            'asset_id' => $r->asset,
            'quantity' => $r->quantity,
            'out_date' => $r->out_date,
            'return_date' => $r->return_date,
            'reason' => $r->reason,
            'out_by' => $r->out_by
        );
        $i = DB::table('asset_outs')->insert($data);
        // update asset onhand
        $asset = DB::table('assets')->where('id', $r->asset)->first();
        $onhand = $asset->onhand - $r->quantity;
        $x = DB::table('assets')->where('id', $r->asset)->update(['onhand'=>$onhand]);
        if($i)
        {
            $r->session()->flash('sms', 'New asset out has been created successfully!');
            return redirect('/asset-out/create');
        }
        else
        {
            $r->session()->flash('sms1', "Fail to create asset out!");
            return redirect('/asset-out/create')->withInput();
        }
    }
    public function edit($id)
    {
        $data['assets'] = DB::table('assets')->where('active',1)->orderBy('name')->get();
        $data['asset_out'] = DB::table('asset_outs')->where('id', $id)->first();
        $data['users'] = DB::table('users')->get();        
        return view('asset-outs.edit', $data);
    }
    public function update(Request $r)
    {
        $data = array(
            'asset_id' => $r->asset,
            'quantity' => $r->quantity,
            'out_date' => $r->out_date,
            'return_date' => $r->return_date,
            'reason' => $r->reason,
            'out_by' => $r->out_by            
        );
        // update asset onhand
        
        $asset_out = DB::table('asset_outs')->where('id', $r->id)->first();
        $asset = DB::table('assets')->where('id', $asset_out->asset_id)->first();

        $qty = $asset->onhand + $asset_out->quantity;

        $a = DB::table('assets')->where('id', $asset_out->asset_id)->update(['onhand'=>$qty]);
        $i = DB::table('asset_outs')->where('id', $r->id)->update($data);
        $new_asset = DB::table('assets')->where('id', $r->asset)->first();
        $nq = $new_asset->onhand - $r->quantity;
        if($i)
        {
            $x = DB::table('assets')->where('id', $r->asset)->update(['onhand'=>$nq]);
            $r->session()->flash('sms', 'All changes have been saved!');
            return redirect('/asset-out/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', "Fail to save changes out!");
            return redirect('/asset-out/edit/'.$r->id);
        }
    }
}
