<?php

namespace App\Http\Middleware;

use Closure;

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
        $roles=$this->getRequireRoleForRoute($request->route());
        if ($request->user()->hasrole($roles) || ! $roles) 
        {
            return $next($request);
        }
        return redirect('noPermission');      
    }
    private function getRequireRoleForRoute($route){
        $action= $route->getAction();
        return isset($action['roles']) ? $action['roles']: null;
    }
}
