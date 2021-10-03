<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::paginate(PAGINATION_COUNT);
        return view('dashboard.skills.index',compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        try{

            $request->validate([
                'name'=>'required|string|max:191',
            ]);

            Skill::create([
                'name'=>$request->input('name'),
            ]);

            return redirect()->route('skills.index')->with('success','The Skill is added Successfully');
        }catch (\Exception $exception){
            return redirect()->route('skills.index')->with('error','There is an error');
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
          $skill = Skill::findOrFail($id);
          return view('dashboard.skills.edit',compact('skill'));
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
            $category = Skill::findOrFail($id);

            $request->validate([
                'name'=>'required|string|max:191',
            ]);

            $category->update([
                'name'=>$request->input('name'),
            ]);

            return redirect()->route('skills.index')->with('success','The Skill updated Successfully');

        }catch (\Exception $exception){
            return redirect()->route('skills.index')->with('error','There is an error');
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
            $skill = Skill::findOrFail($id);
            $skill->delete();
            return redirect()->route('skills.index')->with('error','The Skill is deleted');
        }catch (\Exception $exception){
            return redirect()->route('skills.index')->with('error','There is an error');
        }
    }
}
