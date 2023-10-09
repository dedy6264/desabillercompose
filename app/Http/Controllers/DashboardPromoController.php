<?php

namespace App\Http\Controllers;
use App\Models\Posting;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DashboardPromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $query=Posting::query();
                return Datatables::of($query)
                ->addColumn('statuss', function($item){
                    if($item->status==0){
                        return ' <form action="'.route('dashboardPromo.changeActive',$item->id).'" method="post">'.csrf_field() .method_field('POST').'<button type="submit" class="btn btn-danger btn-icon-split" value="submit"><span class="icon text-white-50"><i class="fas fa-check"></i></span><span class="text">Off</span></button> </form>';
                        // return "<a href='".route('dashboardPromo.changeActive',$item->id)."' class='btn btn-danger btn-icon-split'><span class='icon text-white-50'><i class='fas fa-check'></i></span><span class='text'>Off</span></a>";
                    }else{
                        return ' <form action="'.route('dashboardPromo.changeActive',$item->id).'" method="post">'.csrf_field() .method_field('POST').'<button type="submit" class="btn btn-success btn-icon-split" value="submit"><span class="icon text-white-50"><i class="fas fa-check"></i></span><span class="text">On</span></button> </form>';
                    }
                    // return'<div class="row"><div class="col-md-2"><a href="'.route('product.edit',$item->id).'"class="d-sm-inline-block btn btn-sm btn-success shadow-sm" > <i
                    // class="fas fa-edit fa-sm text-white-50"></i> </a></div>
                    // <div class="col-md-2">
                    // <form action="'.route('product.destroy',$item->id).'" method="post">'.csrf_field() .method_field('delete').'<button type="submit" class="d-sm-inline-block btn btn-sm btn-danger shadow-sm" value="submit"><i
                    // class="fas fa-minus fa-sm text-white-50"></i></button> </form></div></div>';
                })
                ->addColumn('act', function($item){
                    return  '<div class="row"><div class="col-md-2"><a href="'.route('product.edit',$item->id).'"class="d-sm-inline-block btn btn-sm btn-success shadow-sm" > <i
                    class="fas fa-edit fa-sm text-white-50"></i> </a></div>
                    <div class="col-md-2">
                    <form action="'.route('dashboardPromo.destroy',$item->id).'" method="post">'.csrf_field() .method_field('delete').'<button type="submit" class="d-sm-inline-block btn btn-sm btn-danger shadow-sm" value="submit"><i
                    class="fas fa-minus fa-sm text-white-50"></i></button> </form></div></div>';
                })
                ->editColumn('isi', function($item){
                    return substr(strip_tags($item->isi, "<strong><em>"),0,100)."...";
                })
                ->rawColumns(['act','statuss'])
                // ->rawColumns(['column_with_html'])
                // ->rawColumns(['act','active','detail'])
                ->addIndexColumn()
                ->toJson();
            }
        // if(request()->ajax()){
        //     $query=Posting::query();
        //     return Datatables::of($query)
        //     ->addColumn('statuss', function($item){
        //         return  '<div class="row"><div class="col-md-2"><a href="'.route('product.edit',$item->id).'"class="d-sm-inline-block btn btn-sm btn-success shadow-sm" > <i
        //             class="fas fa-edit fa-sm text-white-50"></i> </a></div>
        //             <div class="col-md-2">
        //             <form action="'.route('product.destroy',$item->id).'" method="post">'.csrf_field() .method_field('delete').'<button type="submit" class="d-sm-inline-block btn btn-sm btn-danger shadow-sm" value="submit"><i
        //             class="fas fa-minus fa-sm text-white-50"></i></button> </form></div></div>';
        //         // return '<form action="'.route('dashboard.gallery.destroy',$item->id).'" method="post"> '.csrf_field() .method_field('delete').' <button class="px-4 py-2 font-bold text-white bg-indigo-600 rounded shadow-lg hover:bg-red-600" type="submit" value="submit">Hapus</button> </form>';
        //     })
        //     ->addColumn('act',function($item){
        //         return '<form action="" method="post"> '.csrf_field() .method_field('delete').' <button class="px-4 py-2 font-bold text-white bg-indigo-600 rounded shadow-lg hover:bg-red-600" type="submit" value="submit">Hapus</button> </form>';
        //     })
        //     // ->addColumn('is_featured',function($item){
        //     //     return $item->is_feature ?'YES':'NO';
        //     // })
        //     ->addIndexColumn()
        //     ->rawColumns(['statuss','act'])
        //     ->make();
        // }
        return view("dashboard.promosmg.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posting = Posting::where('id', $request->id)->get();
        if($posting[0]->status==0){
            $posting->toQuery()->update([
            'status' => 1,
            ]);
        }else{
            $posting->toQuery()->update([
                'status' => 0,
                ]);
        }
        return redirect()->route("dashboardPromo.index");
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
    public function edit($id)
    {
        //
    }
    public function changeActive( $id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

        try {
            Posting::where('id',$id)->delete(); 
        } catch (\Throwable $th) {
            return back()->with('fail','gagal menghapus data');
        }
        return redirect()->route('dashboardPromo.index');
    }
}
