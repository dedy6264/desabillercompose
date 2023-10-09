<?php

namespace App\Http\Controllers;
use App\Models\{User,Payment,Product,Transaction,TrxDetail};
use App\Http\Requests\MainRequest;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class MainController extends Controller
{
   
    public function index()
    {
        return view('login');
    }
    public function daftar()
    {
        return view('register');
    }

    public function masuk(MainRequest $request)
    {
        // dd($request->all)
        // dd(Session());
        $user=User::where('username',$request->username)
            ->where('password',md5($request->password))
            ->first();
        // dd($user);
        if(!$user){
            return back()->with('fail','maaf username atau password anda salah');
        }else{
            $request->session()->put('LoggedUser',$user->id);
            return redirect()->route('dashboard');
        }
    }

    public function logout()
    {
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
        }
        return redirect()->route('home');
    }

   
}
