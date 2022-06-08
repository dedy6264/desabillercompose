<?php

namespace App\Http\Controllers;
use App\Models\{User,Payment,Product,Transaction,TrxDetail};
use App\Http\Requests\PendaftaranRequest;

// use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register');
    }

    public function store(PendaftaranRequest $request)
    {

        // dd($request);
        // \DB::enableQueryLog(); // Enable query log
        // dd($request->validate());
        // User::insert($request->validated());
        $user=User::insert([
            'name'=>$request->name,
            'username'=>$request->username,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'password'=>md5($request->password),
            ]);
    // dd(\DB::getQueryLog()); // Show results of log
if($user){
   return back()->with('success','ok bro isoh wes an');

}else{
    return back()->with('fail','ga isoh bro');
}
    }
    public function show($id)
    {
        
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
