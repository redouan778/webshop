<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next)
    {
            if(Auth::check() == true){
                if(Auth::user()->isAdmin == 'yes'){
                return $next($request);
                }
            }
            return redirect('/error')->with('error', 'You have not admin access');
    }
}

