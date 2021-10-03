<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(PAGINATION_COUNT);
        return view('dashboard.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'name'=>'required|string|max:191',
                'meta_KeyWord'=>'max:191',
                'meta_des'=>'max:191',
            ]);
            Category::create([
                'name'=>$request->input('name'),
                'meta_KeyWord'=>$request->input('meta_KeyWord'),
                'meta_des'=>$request->input('meta_des'),
            ]);

            return redirect()->route('categories.index')->with('success','The Category is added Successfully');
        }catch (\Exception $exception){
            return redirect()->route('categories.index')->with('error','There is an error');
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
            $category = Category::findOrFail($id);
            return view('dashboard.categories.edit',compact('category'));
        }catch (\Exception $exception){
            return redirect()->route('categories.index')->with('error','There is an error');
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
            $category = Category::findOrFail($id);

            $request->validate([
                'name'=>'required|string|max:191',
                'meta_KeyWord'=>'max:191',
                'meta_des'=>'max:191',
            ]);

            $category->update([
                'name'=>$request->input('name'),
                'meta_KeyWord'=>$request->input('meta_KeyWord'),
                'meta_des'=>$request->input('meta_des'),
                ]);

            return redirect()->route('categories.index')->with('success','The Category updated Successfully');

        }catch (\Exception $exception){
            return redirect()->route('categories.index')->with('error','There is an error');
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
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()->route('categories.index')->with('error','The category is deleted');
        }catch (\Exception $exception){
            return redirect()->route('categories.index')->with('error','There is an error');
        }
    }
}
