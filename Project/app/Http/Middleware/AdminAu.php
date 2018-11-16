<?php

namespace App\Http\Middleware;

use App\Admin;
use Closure;

class AdminAu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Admin::adminLogged()){
            return redirect()->route('admin.login');
        }
        return $next($request);
    }
}
