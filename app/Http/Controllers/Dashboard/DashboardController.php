<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $comments = Comment::orderBy('id','desc')->paginate(10);
        return view('dashboard.home',compact('comments'));
    }

    public function admin_logout(){
        auth('admin')->logout();
        return redirect()->route('admin_login');
    }
}
