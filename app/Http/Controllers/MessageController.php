<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Database\Eloquent\Model
use DB;


class MessageController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('message'); 
    }


    public function store(Request $request){
    	$id = DB::table('messages')->insertGetId(
		    ['uid' => Auth::id(), 'subject' => $request->subject, 'message' => $request->message]
		);

    	
    	return "message id : ".$id; 
    }


    public function list(){
    	$lists = DB::table('messages')->select('uid', 'subject', 'message')->get();
    	//dd($lists->toArray());
    	return view('message_list', array('lists' => $lists->toArray()));
    }
}