<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class FrontCustomerController extends Controller
{
    public function index(Request $r)
    {
        $seeker = $r->session()->get('customer');
        if($seeker==NULL)
        {
            return redirect('/customerlogin');
        }
        return view('fronts.customers.index');
    }
    public function profile(Request $r)
    {
        $seeker = $r->session()->get('customer');
        if($seeker==NULL)
        {
            return redirect('/customerlogin');
        }
        $id = $r->id;
        $data['customer'] = DB::table('customers')->where('id', $id)->first();
        return view('fronts.customers.profile', $data);
    }
    public function save_profile(Request $r)
    {
        $seeker = $r->session()->get('customer');
        if($seeker==NULL)
        {
            return redirect('/customerlogin');
        }
        $data = array(
            "first_name" => $r->first_name,
            "last_name" => $r->last_name,
            "gender" => $r->gender,
            "email" => $r->email,
            "phone" => $r->phone,
            "address" => $r->address,
            "company_name" => $r->company,
            'username' => $r->username
        );
        if($r->password!=null)
        {
            $data['password'] = bcrypt($r->password);
        }
        $i = DB::table("customers")->where("id", $r->id)->update($data);
        if($i)
        {
            $r->session()->flash("sms", "Update successfully!");
            return redirect("/customer/profile/".$r->id);
        }
        else{
            $r->session()->flash("sms1", "Fail to save changes. You maynot change anything!");
            return redirect("/customer/profile/".$r->id);
        }
    }
    // load product for customer
    public function product(Request $r)
    {
        $q = $r->q;
        $seeker = $r->session()->get('customer');
        if($seeker==NULL)
        {
            return redirect('/customerlogin');
        }
        if($r->q)
        {
            $data['q'] = $q;
            $data['products'] = DB::table('products')->where('active',1)
                ->where(function($query) use ($q){
                    $query->orWhere('name', 'like', "%{$q}%")
                    ->orWhere('type', 'like', "%{$q}%")
                    ->orWhere('description', 'like', "%{$q}%");
                })
                ->orderBy('name')->paginate(22);
            return view('fronts.customers.product', $data);
        }
        else{
            $data['q'] = "";
            $data['products'] = DB::table('products')->where('active',1)->orderBy('name')->paginate(22);
            return view('fronts.customers.product', $data);
        }
      
    }
    public function product_detail($id)
    {
       
        $data['product'] = DB::table('products')
            ->leftJoin('categories', 'products.category_id', 'categories.id')
            ->where('products.id', $id)
            ->select('products.*', 'categories.name as category_name')
            ->first();
        return view('fronts.customers.product-detail', $data);
    }
    // customer register
    public function register()
    {
        return view('fronts.register');
    }
    public function do_register(Request $r)
    {
        $count = DB::table('customers')->where('username', $r->username)->count();
        if ($count>0)
        {
            $r->session()->flash('sms1', 'Username is already used. Please use a different one!');
            return redirect('/customer/register')->withInput();
        }
        else{

            $data = array(
                'first_name' => $r->first_name,
                'last_name' => $r->last_name,
                'phone' => $r->phone,
                'username' => $r->username,
                'password' => bcrypt($r->password)
            );
            if($r->password!=$r->cpassword)
            {
                $r->session()->flash('sms1', 'The password and confirm password is not matched!');
                return redirect('/customer/register')->withInput();
            }
            else{
                $i = DB::table('customers')->insert($data);
                if ($i)
                {
                    return redirect('/customerlogin');
                }
                else{
                    $r->session()->flash('sms1', 'Fail to register your account!');
                    return redirect('/customer/register')->withInput();
                }


            }
        }
    }
}
