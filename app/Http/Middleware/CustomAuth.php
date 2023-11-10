<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // echo "Hi from middleware";
        $path = $request->path();
        
        if(($path == "login" || $path == "signup") && Session::get('email')) {
            return redirect('/');
        }
        else if(($path!="login" && !Session::get('email')) && ($path!="signup" && !Session::get('email'))) {
            return redirect('login');
        }
        return $next($request);
    }
}
