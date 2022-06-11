<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\{Product,User,Transaction,TrxDetail};
use App\Http\Requests\SalesRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use DB;
use Illuminate\Support\Str;

class SalesController extends Controller
{
    public function index()
    {
        if(request()->ajax()){
            $query=Product::where('status_active',1)->select('*')->get();
            // $query=Product::query();
                return Datatables::of($query)
                ->addColumn('action', function($item){
                    return '
                    <form action="'.route('sales.addCart').'" method="post">
                    '.@csrf_field().'
                        <input type"text" name="id" value="'.$item->id.'" hidden ></input>
                        <button type="submit" value="submit" class="addCart d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" title="Tambah ke keranjang"><i
                        class="fas fa-plus fa-sm text-white-50"></i>Add to cart</button>
                    </form
                    ';
                })
                // <a href="'.route('sales.addCart',$item->id).'" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" > <i
                //     class="fas fa-plus fa-sm text-white-50"></i> Add </a>
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make();
            }
            $payment=DB::table('payments')->select('*')->get();
            $cart=Sales::join('products','carts.product_id','=','products.id')
            ->join('users','carts.user_id','=','users.id')
            ->where('user_id',session('LoggedUser'))
            ->select('products.product_name','products.product_price','products.product_code','users.username','carts.qty')
            ->orderBy('carts.qty','desc')
            ->get();
            // $sum=$cart;
            // dd($sum);
        return view('dashboard.sales.tabel',compact('cart','payment'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            if($request->payment_id==1){
                $cart=$this->cart();
                $total=0;
                $trx_no="AME".Str::random(5);
                for($i=0;$i<count($cart);$i++){
                    $total=$total+($cart[$i]['qty']*$cart[$i]['product_price']);
                }
                $payloadTrx=[
                    'trx_no'=>$trx_no,
                    'payment_status'=>"00",
                    'payment_date'=>now(),
                    'payment_method_id'=>$request->payment_id,
                    'payment_reff'=>"reff".Str::random(15),
                    'total_price'=>$total,
                    'created_by'=>"admin",
                    'updated_by'=>"admin",
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ];

                $idTrx=Transaction::insertGetId($payloadTrx);
                $payloadTrxDetail=[];
                for($i=0;$i<count($cart);$i++){
                    $payloadTrxDetail=[
                            'trx_no_reff'=>$trx_no,
                            'transaction_id'=>$idTrx,
                            'product_id'=>$cart[$i]['product_id'],
                            'qty'=>$cart[$i]['qty'],
                            'product_price'=>$cart[$i]['product_price'],
                            'created_at'=>now(),
                            'updated_at'=>now(),
                        ];
                        // $a=array_push($a,$payloadTrxDetail);
                        TrxDetail::insert($payloadTrxDetail);
                    }
                $this->reset();
                }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('fail','something went wrong');
            // something went wrong
        }
        return redirect()->route('sales.index');
    }

    public function addCart(SalesRequest $request)
    {
        
        $idUser=session('LoggedUser');
        $idProd=$request->id;
        //cek produk
        $check=Sales::where('user_id',$idUser)
        ->where('product_id',$idProd)
        ->select('*')
        ->first();
        if($check!=null){
            //jika ada tambah qty
            $qty=$check->qty+1;
            Sales::where('id',$check->id)
            ->update([
                    'qty'=>$qty,
            ]);
            return redirect()->route('sales.index');
        }else{
            //jika tdk ada add baru
            $payload=[
                'user_id'=>$idUser,
                'product_id'=>$idProd,
                'qty'=>1,
                'cart_reff'=>"MBA".$idUser.$idProd.Str::random(5),
            ];
            Sales::create($payload);
            return redirect()->route('sales.index');
        }
    }
    public function reset()
    {
        try {
            // $delete=$sales->delete();
            $delete=Sales::where('user_id',session('LoggedUser'))->delete();
        } catch (\Throwable $th) {
            return back()->with('fail','gagal menghapus data');
        }
        return redirect()->route('sales.index');
    }
    public function cart()
    {
        $cart=Sales::join('products','carts.product_id','=','products.id')
        ->join('users','carts.user_id','=','users.id')
        ->where('user_id',session('LoggedUser'))
        ->select('products.id as product_id','products.product_name','products.product_price','products.product_code','users.username','carts.qty','carts.cart_reff')
        ->orderBy('carts.qty','desc')
        ->get();
        return $cart;
    }
}
