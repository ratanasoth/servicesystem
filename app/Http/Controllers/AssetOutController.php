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
            ->select('asset_outs.*', 'assets.name', 'users.username as user_name')
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
        $data['ins'] = DB::table('asset_ins')
            ->leftJoin('users', 'asset_ins.in_by', 'users.id')
            ->where('asset_ins.active', 1)
            ->where('asset_ins.checkout_id', $id)
            ->orderBy('asset_ins.id','desc')
            ->select('asset_ins.*', 'users.first_name', 'users.last_name')
            ->get();
        return view('asset-outs.checkin', $data);
    }
    public function save_in(Request $r)
    {
        $data = array(
            'checkout_id' => $r->checkout_id,
            'quantity' => $r->return_qty,
            'in_date' => date('Y-m-d'),
            'in_by' => Auth::user()->id,
            'comment' => $r->comment
        );
        // check if user already full return
        $out = DB::table('asset_outs')->where('id', $r->checkout_id)->first();
        $x = $out->quantity;
        $y = $out->return_qty;
        if ($y>=$x)
        {
            // already return
            $r->session()->flash('sms', 'You already fully returned!');
            return redirect('/asset-out/checkin/'.$r->checkout_id);
        }
        else{
            // insert check in
            $i = DB::table('asset_ins')->insert($data);
            if ($i)
            {
                // total balance
                $z = $out->return_qty + $r->return_qty;
                $p = $out->quantity - $z;
                $dd = array(
                    'return_qty' => $z,
                    'due_qty' => $p,
                    'is_returned' => 'Yes'
                );
                $s = DB::table('asset_outs')->where('id', $r->checkout_id)->update($dd);
                if ($s)
                {
                    // update asset balance
                    DB::update("update assets set onhand=onhand + {$r->return_qty} where id={$out->asset_id}");
                }
                $r->session()->flash('sms', 'You have returned successfully!');
                return redirect('/asset-out/checkin/'.$r->checkout_id);
            }
        }
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

        $i = DB::table('asset_outs')->where('id', $r->id)->update($data);

        $nq = $asset->onhand + ($asset_out->quantity - $r->quantity);

        if($i)
        {
            $x = DB::table('assets')->where('id', $r->asset)->update(['onhand'=>$nq]);
            $r->session()->flash('sms', 'All changes have been saved!');
            return redirect('/asset-out/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', "Fail to save changes. You might not change anything!");
            return redirect('/asset-out/edit/'.$r->id);
        }
    }
    public function delete($id)
    {
        // when you delete, return qty back to on hand
        $out = DB::table('asset_outs')->where('id', $id)->first();
        $qty = $out->quantity;
        $rqty = $out->return_qty;
        $balance = $qty - $rqty;
        $sid = $out->asset_id;
        // get asset
        $asset = DB::table('assets')->where('id', $sid)->first();
        $newqty = $asset->onhand + $balance;
        // delete
        $i = DB::table('asset_outs')->where('id', $id)->delete();
        if($i)
        {
            DB::table('assets')->where('id', $sid)->update(['onhand'=>$newqty]);
        }
        $page = @$_GET['page'];
        if ($page>0)
        {
            return redirect('/asset-out?page='.$page);
        }
        return redirect('/asset-out');
    }
}
