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
        // dump($request->path()=='/' || $request->path()=='daftar');
        // dd(session()->has('LoggedUser'));
        if(!session()->has('LoggedUser') && ($request->path() != '/' && $request->path() != 'daftar')){
            return redirect()->route('loginDashboard');
        }
        if(session()->has('LoggedUser')&&($request->path()=='/' || $request->path()=='daftar')){
            // if(session()->has('LoggedUser')){
            return redirect()->route('home');
        }
        return $next($request);
    }
}
