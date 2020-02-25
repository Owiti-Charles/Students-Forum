<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckRole
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
        $roles=$this->getReguiredRoleForRoute($request->route());
        if($request->user()->hasRole($roles)||!$roles)
        {
            return $next($request);
        }
        return redirect()->route('nopermission');

    }
    public function getReguiredRoleForRoute($route){
        $actions=$route->getAction();
        //dd($actions);
        return  isset($actions['roles'])? $actions['roles']: null;

    }
}
