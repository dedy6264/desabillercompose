<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTbTrx extends Migration
{
    // php artisan migrate --path=/database/migrations/mimo/2023_11_04_050053_add_tb_trx.php

    public function up()
    {
        Schema::create('trx_poses', function (Blueprint $table) {
            $table->id();
            $table->string('trx_number',128);
            $table->string('trx_number_partner',128)->default('');
            $table->string('payment_at')->nullable();
            $table->timestamps();
            $table->string('created_by', 128)->nullable()->default('');
            $table->string('updated_by', 128)->nullable()->default('');
            $table->string('status_code',8);
            $table->string('status_message',32)->default('');
            $table->string('status_desc',128)->default('');
            $table->string('status_code_partner',8)->default('');
            $table->string('status_message_partner',32)->default('');
            $table->string('status_desc_partner',128)->default('');
            $table->unsignedInteger('segment_id')->nullable()->default(0);
            $table->unsignedInteger('product_type_id')->default(0);
            $table->string('product_type_name',128)->default('');
            $table->unsignedInteger('product_category_id')->default(0);
            $table->string('product_category_name',128)->default('');
            $table->unsignedInteger('product_id')->default(0);
            $table->string('product_code',128)->default('');
            $table->string('product_name',128)->default('');
            $table->float('product_price')->default(0);
            $table->float('product_admin_fee')->default(0);
            $table->float('product_merchant_fee')->default(0);
            $table->unsignedInteger('quantity')->default(0);
            $table->float('sub_total')->default(0);
            $table->float('grand_total')->default(0);
            $table->string('customer_id',128)->default('');
            $table->string('bill_info',256)->default('');
            $table->unsignedInteger('client_id')->default(0);
            $table->string('client_name',128)->default('');
            $table->unsignedInteger('merchant_id')->default(0);
            $table->string('merchant_name',128)->default('');
            $table->unsignedInteger('merchant_outlet_id')->default(0);
            $table->string('merchant_outlet_name',128)->default('');
            $table->unsignedInteger('user_outlet_id')->default(0);
            $table->string('user_outlet_name',128)->default('');
            $table->unsignedInteger('outlet_device_id')->default(0);
            $table->string('outlet_device_type',64)->default('');
            $table->string('outlet_device_sn',128)->default('');
            $table->unsignedInteger('payment_method_id')->default(0);
            $table->string('payment_method_name',64)->default('');
            $table->string('bill_nfo',225)->default('');
        });
        Schema::create('trx_multibillers', function (Blueprint $table) {
            $table->id();
            $table->string('trx_number',128);
            $table->string('trx_number_partner',128)->default('');
            $table->string('payment_at')->nullable();
            $table->timestamps();
            
            $table->string('created_by', 128)->nullable()->default('');
            $table->string('updated_by', 128)->nullable()->default('');

            $table->string('status_code',8);
            $table->string('status_message',32)->default('');
            $table->string('status_desc',128)->default('');
            $table->string('status_code_partner',8)->default('');
            $table->string('status_message_partner',32)->default('');
            $table->string('status_desc_partner',128)->default('');
            $table->unsignedInteger('segment_id')->nullable()->default(0);
            $table->unsignedInteger('product_type_id')->default(0);
            $table->string('product_type_name',128)->default('');
            $table->unsignedInteger('product_category_id')->default(0);
            $table->string('product_category_name',128)->default('');
            $table->unsignedInteger('product_id')->default(0);
            $table->string('product_code',128)->default('');
            $table->string('product_name',128)->default('');
            $table->float('product_price')->default(0);
            $table->float('product_admin_fee')->default(0);
            $table->float('product_merchant_fee')->default(0);
            $table->unsignedInteger('quantity')->default(0);
            $table->float('sub_total')->default(0);
            $table->float('grand_total')->default(0);
            $table->string('customer_id',128)->default('');
            $table->string('bill_info',256)->default('');
            $table->unsignedInteger('client_id')->default(0);
            $table->string('client_name',128)->default('');
            $table->unsignedInteger('merchant_id')->default(0);
            $table->string('merchant_name',128)->default('');
            $table->unsignedInteger('merchant_outlet_id')->default(0);
            $table->string('merchant_outlet_name',128)->default('');
            $table->unsignedInteger('user_outlet_id')->default(0);
            $table->string('user_outlet_name',128)->default('');
            $table->unsignedInteger('outlet_device_id')->default(0);
            $table->string('outlet_device_type',64)->default('');
            $table->string('outlet_device_sn',128)->default('');
            $table->unsignedInteger('payment_method_id')->default(0);
            $table->string('payment_method_name',64)->default('');
            $table->string('bill_nfo',225)->default('');
        });
    }


    public function down()
    {
        Schema::dropIfExists('trx_poses');
        Schema::dropIfExists('trx_multibillers');
    }
}
