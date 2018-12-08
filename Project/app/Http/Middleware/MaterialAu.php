<?php

namespace App\Http\Middleware;

use App\Admin;
use App\Employees;
use Closure;

class MaterialAu
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
        if (Employees::find(Admin::adminId())->checkRoles(4)){
            return $next($request);
        }
        else{
            return redirect('/admin/error');
        }
    }
}
