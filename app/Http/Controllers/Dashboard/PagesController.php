<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::paginate(PAGINATION_COUNT);
        return view('dashboard.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {

        try{
            //return $request->all();
            Page::create([
                'name'=>$request->input('name'),
                'description'=>$request->input('description'),
                'meta_KeyWord'=>$request->input('meta_KeyWord'),
                'meta_des'=>$request->input('meta_des'),
            ]);

            return redirect()->route('pages.index')->with('success','The Page is added Successfully');
        }catch (\Exception $exception){
            return redirect()->route('pages.index')->with('error','There is an error');
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
            $page = Page::findOrFail($id);
            return view('dashboard.pages.edit',compact('page'));
        }catch (\Exception $exception){
            return redirect()->route('pages.index')->with('error','There is an error');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $category = Page::findOrFail($id);

            $category->update([
                'name'=>$request->input('name'),
                'description'=>$request->input('description'),
                'meta_KeyWord'=>$request->input('meta_KeyWord'),
                'meta_des'=>$request->input('meta_des'),
            ]);

            return redirect()->route('pages.index')->with('success','The Page updated Successfully');

        }catch (\Exception $exception){
            return redirect()->route('pages.index')->with('error','There is an error');
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
            $page = Page::findOrFail($id);
            $page->delete();
            return redirect()->route('pages.index')->with('error','The page is deleted');
        }catch (\Exception $exception){
            return redirect()->route('pages.index')->with('error','There is an error');
        }
    }
}
