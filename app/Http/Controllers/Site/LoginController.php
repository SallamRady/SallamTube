<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view('website.login');
    }

    public function check_user_login(LoginRequest $request){
        //Validation..... in LoginRequest class.
        if( auth('web')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')]) ) {
            return redirect()->route('home');
        }else{
            return back()->withInput($request->only('email'));
        }
    }
}
