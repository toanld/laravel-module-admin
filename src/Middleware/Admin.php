<?php

namespace Hungnm28\LaravelModuleAdmin\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check()){
                $listSuper = env('APP_SUPER_ADMIN');
                $listSuper = explode(",",$listSuper);
                if(in_array(auth()->user()->id,$listSuper)){
                    return $next($request);
                }
                if(auth()->user()->is_admin != true){
                    abort(403,"You are not allowed access to this page!");
                }
        }
        return $next($request);
    }
}
