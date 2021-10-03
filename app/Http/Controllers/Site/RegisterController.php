<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ReqisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('website.register');
    }

    protected function create(ReqisterRequest $data)
    {
        //validation in ReqisterRequest class
        $user = new User();
        $user->name = $data['name'];
        $user->email=$data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        return $this->check_user_login($data);
    }

    protected function check_user_login($request){
        //Validation..... in LoginRequest class.
        if( auth('web')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')]) ) {
            return redirect()->route('home');
        }else{
            return back()->withInput($request->only('email'));
        }
    }
}
