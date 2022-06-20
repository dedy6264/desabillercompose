<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
// use Yajra\DataTables\Facades\DataTables;
use App\Helpers\DateValidation;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());

            $endDate=date('Y-m-d');
            $speleng= mktime(0,0,0,date("n"),date("j")-31,date("Y"));
            $startDate= date("Y-m-d", $speleng);
            $request->merge([
                'startDate'=>$startDate,
                'endDate'=>$endDate,
            ]);
        
            $main=Transaction::join('payments','transactions.payment_method_id','=','payments.id')
            ->whereBetween('transactions.created_at',[$request->startDate.' 00:00:00',$request->endDate.' 23:59:59'])
            ->select('transactions.*','payments.payment_method_name')
            ->get();
        // $dataMain=$this->all($request);
        if(request()->ajax()){
            // dd(request()->ajax());
            // $query=Transaction::query();
                // return Datatables::of($query)
                return datatables()->of($main)
                ->addIndexColumn()
                ->editColumn('created_at', function($itemm){
                    return Carbon::createFromFormat('Y-m-d H:i:s', $itemm->created_at)->format('Y-m-d H:i:s');
                })
                ->make();
            }
        return view('dashboard.transaction.index');
    }           
    public function filter(Request $request)
    {
        // dd(request()->all());  
        // $mainData=$this->all($request);
       
        // \DB::enableQueryLog(); // Enable query log

    $mainData=Transaction::join('payments','transactions.payment_method_id','=','payments.id')
    ->whereBetween('transactions.created_at',[$request->startDate,$request->endDate])
    ->select('transactions.*','payments.payment_method_name')
    ->get();
            // dd(\DB::getQueryLog()); // Show results of log
        if(request()->ajax()){
            
                return datatables()->of($mainData)
                ->addIndexColumn()
                ->editColumn('created_at', function($item){
                    return Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->format('Y-m-d H:i:s');
                })
                ->make();
            }
        return view('dashboard.transaction.filter');
    }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
    public function show(Transaction $transaction)
    {
        // dd($transaction->id);
        $header=Transaction::join('payments','transactions.payment_method_id','=','payments.id')
            ->where('transactions.id',$transaction->id)
            ->select('transactions.*','payments.payment_method_name')
            ->get();
        $detail=Transaction::join('payments','transactions.payment_method_id','=','payments.id')
            ->join('trx_details','transactions.id','=','trx_details.transaction_id')
            ->join('products','products.id','=','trx_details.product_id')
            ->where('transactions.id',$transaction->id)
            ->select('transactions.*','payments.payment_method_name','trx_details.qty','trx_details.product_price','products.product_name')
            ->get();
            // dd($header,$detail);
        return view('dashboard.transaction.details',compact('detail','header'));
    }
    public function all(Request $request){

        // dd($request->all());
        // if(!$request->start_date){
        //     $start_date=Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d')." 00:00:01")->format('Y-m-d H:i:s');
        //     $start_date=Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d')." 00:00:01")->format('Y-m-d H:i:s');
        // }
        // $start_date=createFromFormat('Y-m-d H:i:s', $request->created_at)->format('Y-m-d H:i:s');

                // \DB::enableQueryLog(); // Enable query log

        $main=Transaction::join('payments','transactions.payment_method_id','=','payments.id')
        ->whereBetween('transactions.created_at',[$request->startDate.' 00:00:00',$request->endDate.' 23:59:59'])
        ->select('transactions.*','payments.payment_method_name')
        ->get();
                    // dd(\DB::getQueryLog()); // Show results of log
        return $main;
    }
    public function create()
    {
        
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
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    // public function show(Transaction $transaction)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
