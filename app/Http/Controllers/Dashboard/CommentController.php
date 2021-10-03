<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store_Comment(CommentRequest $request){
        try{
            Video::findOrFail($request->input('video_id'));
            \App\Models\Comment::create([
                'comment'=>$request->input('comment'),
                'video_id'=>$request->input('video_id'),
                'user_id'=>auth('admin')->user()->id,
            ]);
            return redirect()->route('videos.edit',$request->input('video_id'))->with('success','Comment added successfully');

        }catch (\Exception $exception){
            return redirect()->route('videos.edit',$request->input('video_id'))->with('error','error in loading comment');
        }
    }

    public function deleteComment($id){
        try {
            $comment = Comment::findOrFail($id);
            $comment->delete();
            return redirect()->route('videos.edit',$comment->video_id)->with('error','The Comment deleted successfully');
        }catch (\Exception $exception){
            return redirect()->route('videos.edit',$comment->video_id)->with('error','There is an Error');
        }
    }

    public function deleteComment_from_CP($id){
        try {
            $comment = Comment::findOrFail($id);
            $comment->delete();
            return redirect()->route('dashboard');
        }catch (\Exception $exception){
            return redirect()->route('dashboard');
        }
    }


    public function UpdateComment($id) {
        $comment = Comment::findOrFail($id);
        return view('dashboard.comments.edit',compact('comment'));

    }

    public function comment_update($id ,CommentRequest $request){
        return $request;
    }
}
