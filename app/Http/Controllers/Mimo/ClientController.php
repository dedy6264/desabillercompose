<?php

namespace App\Http\Controllers\Mimo;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Mimo\ClientRequest;

use App\Http\Controllers\Controller;
use App\Models\Mimo\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
   
    public function index()
    {
// $ss=Client::get();
// dump($ss);
        if(request()->ajax()){
            $query=Client::query();
                return Datatables::of($query)
                ->addColumn('action', function($item){
                    return '<div class="row"><div class="col-md-2"><a href="'.route('client.edit',$item->id).'"class="d-sm-inline-block btn btn-sm btn-success shadow-sm" > <i
                    class="fas fa-edit fa-sm text-white-50"></i> </a></div>
                    <div class="col-md-2">
                    <form action="'.route('client.destroy',$item->id).'" method="post">'.csrf_field() .method_field('delete').'<button type="submit" class="d-sm-inline-block btn btn-sm btn-danger shadow-sm" value="submit"><i
                    class="fas fa-minus fa-sm text-white-50"></i></button> </form></div></div>';
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make();
            }
        return view('mimo.dashboard.client.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mimo.dashboard.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        dump($request->all());
        $user=User::find(session('LoggedUser'));
        $client=Client::insert([
            'client_name'=>$request->client_name,
            'created_by'=>$user->username,
            'updated_by'=>$user->username,
        ]);
        if($client){
            return redirect()->route('client.index');
        }else{
            return back()->with('fail','maaf, produk anda tidak dapat disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('mimo.dashboard.client.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, Client $client)
    {
        try {
            $update=$client->update($request->all());
        } catch (\Throwable $th) {
            return back()->with('fail','gagal mengupdate data');
            // dd($th);
        }
        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        try {
            dd($client);
            $delete=$client->delete();
        } catch (\Throwable $th) {
            return back()->with('fail','gagal menghapus data');
        }
        return redirect()->route('client.index');
    }
}
