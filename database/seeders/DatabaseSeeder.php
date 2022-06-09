<?php

namespace Database\Seeders;
use App\Models\{User,Payment,Product,Transaction,TrxDetail};

use Illuminate\Database\Seeder;
// use DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::insert([[
            'name' => "admin",
            'username' => "admin",
            'level' => "admin",
            'phone' => "089678971119",
            'email' => 'dedy.kusworo@gmail.com',
            'password' => md5('password'),
        ],[
            'name' => "akun samaran",
            'username' => "akun",
            'level' => "user",
            'phone' => "082137789378",
            'email' => 'dedy.kusworo6264@gmail.com',
            'password' => md5('password'),
        ]]);
        Payment::insert([[
            'payment_method_name' => "TUNAI",
        ],[
            'payment_method_name' => "QRIS",
        ]]);
        Product::insert([[
            'product_code'=>'A0001',
            'product_name'=>'PENSIL',
            'product_desc'=>'PENSIL',
            'product_cost'=>1500,
            'product_price'=>2000,
            'status_active'=>'1',
            'created_by'=>'admin',
            'updated_by'=>'admin',
            'created_at'=>now(),
            'updated_at'=>now(),
        ],[
            'product_code'=>'A0002',
            'product_name'=>'BOLPEN',
            'product_desc'=>'BOLPEN',
            'product_cost'=>2500,
            'product_price'=>3000,
            'status_active'=>'1',
            'created_by'=>'admin',
            'updated_by'=>'admin',
            'created_at'=>now(),
            'updated_at'=>now(),
        ],[
            'product_code'=>'A0003',
            'product_name'=>'BUKU',
            'product_desc'=>'BUKU',
            'product_cost'=>2500,
            'product_price'=>3000,
            'status_active'=>'1',
            'created_by'=>'admin',
            'updated_by'=>'admin',
            'created_at'=>now(),
            'updated_at'=>now(),
        ],[
            'product_code'=>'A0004',
            'product_name'=>'KERTAS',
            'product_desc'=>'KERTAS',
            'product_cost'=>2500,
            'product_price'=>3000,
            'status_active'=>'1',
            'created_by'=>'admin',
            'updated_by'=>'admin',
            'created_at'=>now(),
            'updated_at'=>now(),
        ],[
            'product_code'=>'A0005',
            'product_name'=>'KABEL',
            'product_desc'=>'KABEL',
            'product_cost'=>2500,
            'product_price'=>3000,
            'status_active'=>'1',
            'created_by'=>'admin',
            'updated_by'=>'admin',
            'created_at'=>now(),
            'updated_at'=>now(),
        ],[
            'product_code'=>'A0006',
            'product_name'=>'HVS 120GR',
            'product_desc'=>'HVS 120GR',
            'product_cost'=>2500,
            'product_price'=>3000,
            'status_active'=>'1',
            'created_by'=>'admin',
            'updated_by'=>'admin',
            'created_at'=>now(),
            'updated_at'=>now(),
        ],[
            'product_code'=>'A0007',
            'product_name'=>'FOLIO 80GR',
            'product_desc'=>'FOLIO 80GR',
            'product_cost'=>2500,
            'product_price'=>3000,
            'status_active'=>'1',
            'created_by'=>'admin',
            'updated_by'=>'admin',
            'created_at'=>now(),
            'updated_at'=>now(),
        ],[
            'product_code'=>'A0008',
            'product_name'=>'BOLPEN PILOT',
            'product_desc'=>'BOLPEN PILOT',
            'product_cost'=>2500,
            'product_price'=>3000,
            'status_active'=>'1',
            'created_by'=>'admin',
            'updated_by'=>'admin',
            'created_at'=>now(),
            'updated_at'=>now(),
        ],[
            'product_code'=>'A0009',
            'product_name'=>'LCD 14"',
            'product_desc'=>'LCD 14"',
            'product_cost'=>2500,
            'product_price'=>3000,
            'status_active'=>'1',
            'created_by'=>'admin',
            'updated_by'=>'admin',
            'created_at'=>now(),
            'updated_at'=>now(),
        ],[
            'product_code'=>'A0010',
            'product_name'=>'BLINDER',
            'product_desc'=>'BLINDER',
            'product_cost'=>2500,
            'product_price'=>3000,
            'status_active'=>'1',
            'created_by'=>'admin',
            'updated_by'=>'admin',
            'created_at'=>now(),
            'updated_at'=>now(),
        ],[
            'product_code'=>'A0011',
            'product_name'=>'PULAS',
            'product_desc'=>'PULAS',
            'product_cost'=>2500,
            'product_price'=>3000,
            'status_active'=>'1',
            'created_by'=>'admin',
            'updated_by'=>'admin',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]]);
        Transaction::insert([[
            'trx_no'=>'KSR'.now().'001',
            'payment_status'=>'PAYMENT',
            'payment_date'=>now(),
            'payment_method_id'=>1,
            'payment_reff'=>"jhgkjhvkj",
            'total_price'=>4000,
            'created_by'=>'admin',
            'updated_by'=>'admin',
        ],[
            'trx_no'=>'KSR'.now().'002',
            'payment_status'=>'PAYMENT',
            'payment_date'=>now(),
            'payment_method_id'=>1,
            'payment_reff'=>"jlhgkuhg",
            'total_price'=>4000,
            'created_by'=>'admin',
            'updated_by'=>'admin',
        ]]);

        TrxDetail::insert([[
            'trx_no_reff'=>'KSR'.now().'001',
            'transaction_id'=>1,
            'product_id'=>1,
            'qty'=>2,
            'product_price'=>2000,
        ],[
            'trx_no_reff'=>'KSR'.now().'002',
            'transaction_id'=>2,
            'product_id'=>2,
            'qty'=>2,
            'product_price'=>2000,
        ],[
            'trx_no_reff'=>'KSR'.now().'002',
            'transaction_id'=>2,
            'product_id'=>1,
            'qty'=>3,
            'product_price'=>6000,
        ]]);




    }
}
