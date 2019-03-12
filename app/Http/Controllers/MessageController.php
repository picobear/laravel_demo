<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
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
    	$lists = DB::table('messages')->select('id', 'uid', 'subject', 'message')->get();
    	return view('message_list', array('lists' => $lists->toArray()));
    }

    public function reply(Request $request){
    	$item = DB::table('messages')->select('id', 'uid', 'subject', 'message')->where('id', $request->id)->get();
    	return view('message_reply', array('item' => $item->toArray())); 
    }


    public function reply_post(Request $request){
    	$id = DB::table('reply_message')->insertGetId(
		    ['pid' => $request->id, 'uid' => Auth::id(), 'message' => $request->reply_message, 'status' => 1]);
		
		$count = 0;
    	if($id){
    		$count = DB::table('reply_message')->where('pid', $request->id)->count();
    	}
    	
    	return "reply_message id : ".$id."  reply count : ".$count; 
    }
}