<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use App\Models\{Product,User};
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        if(request()->ajax()){
        $query=Product::query();
            return Datatables::of($query)
            ->addColumn('action', function($item){
                return '<div class="row"><div class="col-md-2"><a href="'.route('product.edit',$item->id).'"class="d-sm-inline-block btn btn-sm btn-success shadow-sm" > <i
                class="fas fa-edit fa-sm text-white-50"></i> </a></div>
                <div class="col-md-2">
                <form action="'.route('product.destroy',$item->id).'" method="post">'.csrf_field() .method_field('delete').'<button type="submit" class="d-sm-inline-block btn btn-sm btn-danger shadow-sm" value="submit"><i
                class="fas fa-minus fa-sm text-white-50"></i></button> </form></div></div>';
            })
            ->rawColumns(['action'])
            ->make();
        }
        return view('dashboard.product.index');
        
    }
    public function create()
    {
        return view('dashboard.product.create');
    }
    public function store(ProductRequest $request)
    {
        // dd(session('LoggedUser'));
        $user=User::find(session('LoggedUser'));
        $product=Product::insert([
            'product_code'=>$request->product_code,
            'product_name'=>$request->product_name,
            'product_desc'=>$request->product_desc,
            'product_cost'=>$request->product_cost,
            'product_price'=>$request->product_price,
            'created_by'=>$user->username,
            'updated_by'=>$user->username,
        ]);
        if($product){
            return redirect()->route('product.index');
        }else{
            return back()->with('fail','maaf, produk anda tidak dapat disimpan');
        }
    }
    public function edit(Product $product)
    {
        return view('dashboard.product.edit',compact('product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        try {
            $update=$product->update($request->all());
        } catch (\Throwable $th) {
            return back()->with('fail','gagal mengupdate data');
            // dd($th);
        }
        return redirect()->route('product.index');
    }
    public function destroy(Product $product)
    {
        try {
            $delete=$product->delete();
        } catch (\Throwable $th) {
            return back()->with('fail','gagal menghapus data');
        }
        return redirect()->route('product.index');
    }
}
