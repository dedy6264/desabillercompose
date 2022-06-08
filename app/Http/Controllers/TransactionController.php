<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $mainData=Transaction::join('payments','transactions.payment_method_id','=','payments.id')
                    ->select('transactions.*','payments.payment_method_name')
                    ->get();
        if(request()->ajax()){
            // $query=Transaction::query();
                // return Datatables::of($query)
                return datatables()->of($mainData)
                ->addIndexColumn()
                ->make();
            }
        return view('dashboard.transaction.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
