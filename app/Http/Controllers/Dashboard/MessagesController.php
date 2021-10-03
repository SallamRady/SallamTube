<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Mail\RepeatMessage;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessagesController extends Controller
{
    public function index(){
        $messages = Message::orderBy('id','desc')->paginate(30);
        return view('dashboard.messages.index',compact('messages'));
    }

    public function add_message(Request $request){
        //Validation....
        $request->validate([
            'email'=>'required|email',
            'name'=>'required|string|min:4|max:40',
            'message'=>'required|string|min:10',
        ]);
        Message::create($request->except(['_token']));
        return redirect()->route('landing_page',['#formH'])->with('success','Your message arrived :) thanks!');
    }

    public function repeat($id){

        $message = Message::findOrFail($id);
        return view('dashboard.messages.repeat',compact('message'));

    }

    public function send_repeat(Request $request)
    {
        $request->validate([
            'repeat'=>'required|string',
        ]);
        $message = Message::findOrFail($request->message_id);
        Mail::to($request->email)->send(new RepeatMessage($request->repeat));
        $message->update([
            'repeated' => 1,
        ]);
        return back()->with('success','The repeat send :)');
    }
}
