<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class CustomerFeedbackController extends Controller
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
            $data['feedbacks'] = DB::table('feedbacks')
                ->where('active',1)
                ->where('feedback_by', $customer->id)
                ->where(function($query) use ($q) {
                    $query->orWhere('subject', 'like', "%{$q}%")
                        ->orWhere('description', 'like', "%{$q}%");
                })
                ->orderBy('id', 'desc')
                ->paginate(22);
            return view('fronts.feedbacks.index', $data);
        }
        else{
            $data['q'] = "";
            $data['feedbacks'] = DB::table('feedbacks')
                ->where('active',1)
                ->where('feedback_by', $customer->id)
                ->orderBy('id', 'desc')
                ->paginate(12);
            return view('fronts.feedbacks.index', $data);
        }
    }
    public function create(Request $r)
    {
        $customer = $r->session()->get('customer');
        if($customer==NULL)
        {
            return redirect('/customerlogin');
        }
        return view('fronts.feedbacks.create');
    }
    public function save(Request $r)
    {
        $customer = $r->session()->get('customer');
        if($customer==NULL)
        {
            return redirect('/customerlogin');
        }
        $id = $customer->id;
        $data = array(
            'subject' => $r->subject,
            'feedback_to' => $r->feedback_to,
            'description' => $r->description,
            'feedback_by' => $id
        );
        $i = DB::table('feedbacks')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', "Your feedback has been sent successfully!");
            return redirect('/customer/feedback/create');
        }
        else{
            $r->session()->flash('sms1', 'Fail to create new feedback!');
            return redirect('/customer/feedback/create')->withInput();
        }
    }
    public function update(Request $r)
    {
        $customer = $r->session()->get('customer');
        if($customer==NULL)
        {
            return redirect('/customerlogin');
        }
        $id = $r->id;
        $data = array(
            'subject' => $r->subject,
            'feedback_to' => $r->feedback_to,
            'description' => $r->description
        );
        $i = DB::table('feedbacks')->where('id', $id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', "All changes have been saved successfully!");
            return redirect('/customer/feedback/detail/'.$r->id);
        }
        else{
            $r->session()->flash('sms1', 'Fail to save change. You may not change anything!');
            return redirect('/customer/feedback/detail/'.$r->id);
        }
    }
    public function  detail(Request $r)
    {
        $customer = $r->session()->get('customer');
        if($customer==NULL)
        {
            return redirect('/customerlogin');
        }
        $data['feedback'] = DB::table('feedbacks')->where('id', $r->id)->first();
        return view('fronts.feedbacks.detail', $data);
    }
    public function delete(Request $r)
    {
        $customer = $r->session()->get('customer');
        if($customer==NULL)
        {
            return redirect('/customerlogin');
        }
        $id = $r->id;
        $i = DB::table('feedbacks')->where('id', $id)->update(['active'=>0]);
        $r->session()->flash('sms', "Your feedback has been deleted successfully!");
        return redirect('/customer/feedback');
    }
}
