<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next)
    {
            if (auth()->User()->isAdmin == 1) {
                return $next($request);
            }
            return redirect('/homepage')->with('error', 'You have not admin access');
    }
}

