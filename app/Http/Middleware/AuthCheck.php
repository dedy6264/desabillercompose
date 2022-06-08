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
        // dd($request->path());
        if(!session()->has('LoggedUser') && ($request->path() != '/' && $request->path() != 'daftar')){
            return redirect('index')->with('fail', 'you musht be logged in');
        }
        if(session()->has('LoggedUser')&&($request->path()=='/' || $request->path()=='daftar')){
            return back();
        }
        return $next($request);
    }
}
