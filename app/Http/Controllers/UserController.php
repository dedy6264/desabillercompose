<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Product,User,Transaction,TrxDetail};
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        if(request()->ajax()){
            $query=User::query();
                return Datatables::of($query)
                ->addColumn('action', function($item){
                    return '<div class="row"><div class="col-md-2"><a href="'.route('user.edit',$item->id).'"class="d-sm-inline-block btn btn-sm btn-success shadow-sm" > <i
                    class="fas fa-edit fa-sm text-white-50"></i> </a></div>
                    <div class="col-md-2">
                    <form action="'.route('user.destroy',$item->id).'" method="post">'.csrf_field() .method_field('delete').'<button type="submit" class="d-sm-inline-block btn btn-sm btn-danger shadow-sm" value="submit"><i
                    class="fas fa-minus fa-sm text-white-50"></i></button> </form></div></div>';
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make();
            }
        return view('dashboard.user.index');
    }

    public function create()
    {
        return view('dashboard.user.create');
    }

    public function store(Request $request)
    {
        
        $user=User::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'email_verified_at'=>now(),
            'password'=>md5($request->password),
            'username'=>$request->username,
            'level'=>"user",
            'phone'=>$request->phone,
        ]);
        if($user){
            return redirect()->route('user.index');
        }else{
            return back()->with('fail','maaf, produk anda tidak dapat disimpan');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        return view('dashboard.user.edit',compact('user'));
    }

    public function update(Request $request, User $user)
    {
        try {
            $update=$user->update($request->all());
        } catch (\Throwable $th) {
            return back()->with('fail','gagal mengupdate data');
            // dd($th);
        }
        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        if($user->id==Session('LoggedUser')){
            return back()->with('fail','gagal menghapus data');
        }
        try {
            $delete=$user->delete();
        } catch (\Throwable $th) {
            return back()->with('fail','gagal menghapus data');
        }
        return redirect()->route('user.index');
    }
}
