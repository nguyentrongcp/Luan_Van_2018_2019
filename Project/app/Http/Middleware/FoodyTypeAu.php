<?php

namespace App\Http\Middleware;

use App\Admin;
use App\Employees;
use Closure;

class FoodyTypeAu
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
        if (Employees::find(Admin::adminId())->checkRoles(2)){
            return $next($request);
        }
        else{
            return redirect('/admin/error');
        }
    }
}
