<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin');
    }


    public function login(){
        return view('dashboard.login');
    }

    public function check_admin_login(LoginRequest $request){
        //Validation..... in LoginRequest class.
        if( auth('admin')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')]) ) {
            return redirect()->intended('admin/dashboard');
        }else{
            return back()->withInput($request->only('email'));
        }
    }
}
