<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {

            if($request->is('/admin/*')){
                return redirect()->route('admin_login');
            }else{
                return route('user_login');
            }


            /*if($request->segment(1) == 'admin'){
                return redirect()->route('admin_login');
            }else {
                return route('user_login');
            }*/
        }
    }
}
