<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
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
        if(session("role") && session("role")=="admin" && session("user-status")== 1 ){
            $path = $request->path();
            $path_check = explode("/",$path);
           
            if($path_check[0] == "admin"){
                return $next($request);
            }else{
                return \redirect("login");
            }
        }
        if(session("role") && session("role")=="employee" && session("user-status")== 1 ){
            $path = $request->path();
            $path_check = explode("/",$path);
           
            if($path_check[0] == "employee"){
                return $next($request);
            }else{
                return \redirect("login");
            }
        }
        if(session("user-status") == 0){
            return \redirect("login")->withErrors([
                "errors" => "Acount not acivated yet. Please wait for a few minutes."
            ]);
        }
        return \redirect("login");
    }
}
