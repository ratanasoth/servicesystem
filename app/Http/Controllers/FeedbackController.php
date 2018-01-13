<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
class FeedbackController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['feedbacks'] = DB::table('feedbacks')->where('active', 1)->orderBy('id', 'desc')->paginate(12);
        return view('feedbacks.index', $data);
    }
    public function detail($id)
    {
        $data['feedback'] = DB::table('feedbacks')
            ->leftJoin('customers', 'feedbacks.feedback_by', 'customers.id')
            ->where('feedbacks.id', $id)
            ->select('feedbacks.*', 'customers.first_name', 'customers.last_name')
            ->first();
        return view('feedbacks.detail', $data);
    }
    public function delete($id)
    {
        DB::table('feedbacks')->where('id', $id)->update(["active"=>0]);
        $page = @$_GET['page'];
        if ($page>0)
        {
            return redirect('/feedback?page='.$page);
        }
        return redirect('/feedback');
    }
}
