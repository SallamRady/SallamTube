<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function show_page($id){
        $page = Page::findOrFail($id);
        return view('website.pages.show',compact('page'));
    }

}
