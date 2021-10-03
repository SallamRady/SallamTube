<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReqisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(PAGINATION_COUNT);
        return view('dashboard.users.index',compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReqisterRequest $request)
    {
        try{
            User::create([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'password'=>Hash::make($request->input('password')),
                'best_sentence'=>$request->input('best_sentence'),
            ]);

            return redirect()->route('users.index')->with('success','The User is added Successfully');
        }catch (\Exception $exception){
            return redirect()->route('users.index')->with('error','There is an error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            $user = User::findOrFail($id);
            return view('dashboard.users.edit',compact('user'));
        }catch (\Exception $exception){
            return redirect()->route('users.index')->with('error','There is an error');
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
            $user = User::findOrFail($id);

            $request->validate([
                'email'=>'required|email',
                'name'=>'required|string|min:4|max:40',
            ]);

            if($request->input('password') != null ){
                $request->validate([
                    'password'=>'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
                    'password_confirmation'=>'required|same:password',
                ],[
                    'password.regex'=>'The password must be at least 8 chars,have at least 1 Upper Case , 1 Lower Case , 1 Numeric ,and anther char',
                ]);
                $user->update([
                    'name'=>$request->input('name'),
                    'email'=>$request->input('email'),
                    'password'=>Hash::make($request->input('password')),
                    'best_sentence'=>$request->input('best_sentence'),
                ]);
            }else{
                $user->update([
                    'name'=>$request->input('name'),
                    'email'=>$request->input('email'),
                    'best_sentence'=>$request->input('best_sentence'),
                ]);
            }

            return redirect()->route('users.index')->with('success','The User profile updated Successfully');

        }catch (\Exception $exception){
            return redirect()->route('users.index')->with('error','There is an error');
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
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('users.index')->with('error','The User is deleted');
        }catch (\Exception $exception){
            return redirect()->route('users.index')->with('error','There is an error');
        }
    }
}
