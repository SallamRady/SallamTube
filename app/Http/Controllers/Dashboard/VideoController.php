<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::paginate(PAGINATION_COUNT);
        return view('dashboard.videos.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $skills =Skill::all();
        $tags   =Tag::all();
        return view('dashboard.videos.create',compact('categories','skills','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {
        try{
            $poster = $request->file('poster');
            $imageName = time().$poster->getClientOriginalName();
            $poster->move(public_path('Uploads'),$imageName);
            $video = Video::create([
                'name'=>$request->input('name'),
                'description'=>$request->input('description'),
                'poster'=>$imageName,
                'status'=>$request->input('status'),
                'youtube_link'=>$request->input('youtube_link'),
                'category_id'=>$request->input('category_id'),
                'user_id'=>auth('admin')->user()->id,
                'meta_KeyWord'=>$request->input('meta_KeyWord'),
                'meta_des'=>$request->input('meta_des'),
            ]);

            if($request->has('skills') && !empty($request->input('skills'))) {
                $video->skills()->sync($request->input('skills'));
            }
            if($request->has('tags') && !empty($request->input('tags'))) {
                $video->tags()->sync($request->input('tags'));
            }
            return redirect()->route('videos.index')->with('success','The Video is added Successfully');
        }catch (\Exception $exception){
            return redirect()->route('videos.index')->with('error','There is an error');
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $video = Video::findOrFail($id);
            $categories = Category::all();
            $skills =Skill::all();
            $tags   =Tag::all();
            $skills_ids = $video->skills->pluck('id')->toArray();
            $tags_ids = $video->tags->pluck('id')->toArray();
            $comments = \App\Models\Comment::select('comment','id')->where('video_id',$video->id)->get();
            return view('dashboard.videos.edit',compact('video','categories','skills','skills_ids','tags','tags_ids','comments'));
        }catch (\Exception $exception){
            return redirect()->route('videos.index')->with('error','There is an error');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoRequest $request, $id)
    {
        try{
            $poster = $request->file('poster');
            $imageName = time().$poster->getClientOriginalName();
            $poster->move(public_path('Uploads'),$imageName);
            $video = Video::findOrFail($id);
            $video->update([
                'name'=>$request->input('name'),
                'description'=>$request->input('description'),
                'poster'=>$imageName,
                'status'=>$request->input('status'),
                'youtube_link'=>$request->input('youtube_link'),
                'category_id'=>$request->input('category_id'),
                'user_id'=>auth('admin')->user()->id,
                'meta_KeyWord'=>$request->input('meta_KeyWord'),
                'meta_des'=>$request->input('meta_des'),
            ]);

            if($request->has('skills') && !empty($request->input('skills'))) {
                $video->skills()->sync($request->input('skills'));
            }
            if($request->has('tags') && !empty($request->input('tags'))) {
                $video->tags()->sync($request->input('tags'));
            }

            return redirect()->route('videos.index')->with('success','The Video updated Successfully');

        }catch (\Exception $exception){
            return redirect()->route('videos.index')->with('error','There is an error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $video = Video::findOrFail($id);
            $video->delete();
            return redirect()->route('videos.index')->with('error','The Video is deleted');
        }catch (\Exception $exception){
            return redirect()->route('videos.index')->with('error','There is an error');
        }
    }
}
