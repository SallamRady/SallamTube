<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Page;
use App\Models\Skill;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $videos = Video::orderBy('id','desc');
        if(\request()->has('search') && !empty(\request('search'))){
            $videos = $videos->where('name','like','%'.\request('search').'%');
        }
        $videos = $videos->paginate(30);
        return view('home',compact('videos'));
    }

    public function userProfile(){
        return view('website.users.profile');
    }

     public function category_videos($id){
        Video::findOrFail($id);
        $videos = Video::where('category_id',$id)->orderBy('id','desc')->paginate(30);
        return view('website.videos.index',compact('videos'));
    }


    public function skill_videos($id){
        $skill = Skill::findOrFail($id);
        $videos = Video::whereHas('skills',function ($query) use ($id) {
            $query->where('skill_id',$id);
        })->where('id',$id)->orderBy('id','desc')->paginate(30);
        return view('website.videos.index',compact('videos'));
    }


    public function video_show($id){
        $video = Video::findOrFail($id);
        $comments = Comment::where('video_id',$id)->orderBy('id','desc')->get();
        $cat_videos = Video::where('category_id',$video->category_id)->orderBy('id','desc')->paginate(30);
        $videos = Video::where('category_id','!=',$video->category_id)->orderBy('id','desc')->paginate(30);
        return view('website.videos.show',compact('video','comments','cat_videos','videos'));
    }


    public  function add_comment(CommentRequest $request){
        Video::findOrFail($request->input('video_id'));
        \App\Models\Comment::create([
            'comment'=>$request->input('comment'),
            'video_id'=>$request->input('video_id'),
            'user_id'=>auth()->user()->id,
        ]);
        return back();
    }


    public function edit_comment(CommentRequest $request){
        Video::findOrFail($request->input('video_id'));
        $comment = Comment::findOrFail($request->input('comment_id'));
        $comment->update([
            'comment'=>$request->input('comment'),
        ]);
        return back();
    }

    public function delete_comment($id){
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return back();
    }


    public function update_user_profile(Request $request){

       try{
           $user = User::findOrFail(auth('web')->user()->id);

           if( ($request->has('email')) &&  !empty($request->input('email'))){
               if($request->input('email') != auth('web')->user()->email){
                   $request->validate([
                       'email'=>'required|email|unique:users',
                       'name'=>'required|string|min:4|max:40',
                   ]);
               } else{
                   $request->validate([
                       'email'=>'required|email',
                       'name'=>'required|string|min:4|max:40',
                   ]);
               }

               $user->update([
                   'name'=>$request->input('name'),
                   'email'=>$request->input('email'),
               ]);

           }

           if( ($request->has('password')) &&  !empty($request->input('password'))){
               $request->validate([
                   'password'=>'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
                   'password_confirmation'=>'required|same:password',
               ]);

               $user->update([
                   'password'=>Hash::make($request->input('password')),
               ]);
           }

           return redirect()->route('userProfile')->with('success');

       }catch (\Exception $exception){
           return redirect()->route('userProfile')->with('error');
       }

    }


    public function logout(){
        User::findOrFail(auth()->user()->id);
        auth('web')->logout();
        return redirect()->route('landing_page');
    }


}
