<?php

namespace App\Http\Controllers;

use App\Models\{Transaction,User};
use Illuminate\Http\Request;
use App\Helpers\DateValidation;
use Carbon\Carbon;
use Rap2hpoutre\FastExcel\FastExcel;

// use App\Services\PayUService\Exception;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        $endDate=date('Y-m-d');
        $speleng= mktime(0,0,0,date("n"),date("j")-31,date("Y"));
        $startDate= date("Y-m-d", $speleng);
       $user=User::select('id','name')
       ->get()
       ->prepend([
        'id' => -1,
        'name' => 'ALL'
       ]);

                // \DB::enableQueryLog(); // Enable query log
       $main=Transaction::join('users','transactions.created_by','=','users.name')
       ->join('payments','transactions.payment_method_id','=','payments.id')     
                ->when($request->sales!='-1',function($query)use($request){
                   return $query->where('users.id',$request->sales);
                })
                ->where(function($query) use ($request,$startDate,$endDate)  {
                        if(!$request->startDate) {
                        $query->whereBetween('transactions.created_at',[$startDate.' 00:00:00',$endDate.' 23:59:59']);
                    }else{
                        $query->whereBetween('transactions.created_at',[$request->startDate.' 00:00:00',$request->endDate.' 23:59:59']);
                    }
                 })
                 ->when($request->status!='',function($query)use($request){
                    return $query->where('transactions.payment_status',$request->status);
                 })
                 ->orderBy('transactions.payment_date','desc')
                ->select('transactions.*','payments.payment_method_name')
                ->get();
                                    // dump(\DB::getQueryLog()); // Show results of log
                                    // dump($main);
           
            if(!$request->startDate){
                $main=Transaction::join('payments','transactions.payment_method_id','=','payments.id')
                ->whereBetween('transactions.created_at',[$startDate.' 00:00:00',$endDate.' 23:59:59'])
                ->orderBy('transactions.payment_date','desc')
                ->select('transactions.*','payments.payment_method_name')
                ->get();
            }else{
                $main=Transaction::join('payments','transactions.payment_method_id','=','payments.id')
                ->whereBetween('transactions.created_at',[$request->startDate.' 00:00:00',$request->endDate.' 23:59:59'])
                ->orderBy('transactions.payment_date','desc')
                ->select('transactions.*','payments.payment_method_name')
                ->get();
            }
            if(count($main)==0){

                return back();
            }
        
        return view('dashboard.transaction.index',compact('main','user'));
    }           
    public function show(Transaction $transaction)
    {
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
        return view('dashboard.transaction.details',compact('detail','header'));
    }
    public function export(Request $request){
        // dd($reques÷t);
        $endDate=date('Y-m-d');
        $speleng= mktime(0,0,0,date("n"),date("j")-31,date("Y"));
        $startDate= date("Y-m-d", $speleng);
        $main=Transaction::join('payments','transactions.payment_method_id','=','payments.id')
        ->join('trx_details','transactions.id','=','trx_details.transaction_id')
        ->join('products','products.id','=','trx_details.product_id')
        // ->whereBetween('transactions.created_at',[$request->startDate.' 00:00:00',$request->endDate.' 23:59:59'])
        ->whereBetween('transactions.created_at',[$startDate.' 00:00:00',$endDate.' 23:59:59'])
        ->select('transactions.trx_no',
        'transactions.payment_status',
        'transactions.payment_date',
        'transactions.payment_reff',
        'trx_details.product_price',
        'trx_details.qty',
        'products.product_code',
        'products.product_name',
        'products.product_code',
        'payments.payment_method_name')
        ->get();
        return (new FastExcel($main))->download('transaction.xlsx', function ($result) {
            return [
                'No Transaction'   => $result->trx_no,
                'Payment Status'   => $result->payment_status,
                'Payment Method'   => $result->payment_method_name,
                'Payment Reff'     => $result->payment_reff,
                'Payment Date'     => $result->payment_date,
                'Product Name'     => $result->product_name,
                'qty'              => $result->qty,
                'Total Price'      => $result->qty*$result->product_price,
            ];
        });
    }
    
}
