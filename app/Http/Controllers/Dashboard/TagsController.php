<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagsRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::paginate(PAGINATION_COUNT);
        return view('dashboard.tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagsRequest $request)
    {
        try{

            Tag::create([
                'name'=>$request->input('name'),
            ]);

            return redirect()->route('tags.index')->with('success','The Tag is added Successfully');

        }catch (\Exception $exception){

            return redirect()->route('tags.index')->with('error','There is an error');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $tag = Tag::findOrFail($id);
            return view('dashboard.tags.edit',compact('tag'));
        }catch (\Exception $exception){
            return redirect()->route('tags.index')->with('error','There is an error');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagsRequest $request, $id)
    {
        try{
            $category = Tag::findOrFail($id);


            $category->update([
                'name'=>$request->input('name'),
            ]);

            return redirect()->route('tags.index')->with('success','The Tag updated Successfully');

        }catch (\Exception $exception){
            return redirect()->route('tags.index')->with('error','There is an error');
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
            $skill = Tag::findOrFail($id);
            $skill->delete();
            return redirect()->route('tags.index')->with('error','The Tag is deleted');
        }catch (\Exception $exception){
            return redirect()->route('tags.index')->with('error','There is an error');
        }
    }
}
