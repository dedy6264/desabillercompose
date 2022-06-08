<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\{Product,User};
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SalesController extends Controller
{
    public function index()
    {
        if(request()->ajax()){
            $query=Product::query();
                return Datatables::of($query)
                ->addColumn('action', function($item){
                    return '<a href="'.route('product.edit',$item->id).'"class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" > <i
                    class="fas fa-plus fa-sm text-white-50"></i> Add </a>';
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make();
            }
        return view('dashboard.sales.tabel');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sales)
    {
        //
    }
}
