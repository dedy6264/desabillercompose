<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('username')->unique();
            $table->string('level')->default('user');
            $table->string('phone')->default('');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_method_name');
            $table->timestamps();
        });
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_code')->unique();
            $table->string('product_name');
            $table->string('product_desc');
            $table->unsignedInteger('product_cost');
            $table->unsignedInteger('product_price');
            $table->string('status_active');
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();
            
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('trx_no',225)->unique();
            $table->string('payment_status',10);
            $table->timestamp('payment_date');
            $table->unsignedInteger('payment_method_id');
            $table->string('payment_reff',225)->default(null)->unique();
            $table->unsignedInteger('total_price');
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();
            // $table->foreign('transaction_id')->references('id')->on('transactions');
        });

        Schema::create('trx_details', function (Blueprint $table) {
            $table->id();
            $table->string('trx_no_reff');
            $table->unsignedInteger('transaction_id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('qty');
            $table->unsignedInteger('product_price');
            $table->timestamps();
            $table->foreign('transaction_id')->references('id')->on('transactions');
            $table->foreign('product_id')->references('id')->on('products');
        });
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('cart_reff',10)->unique();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('qty');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
        Schema::dropIfExists('trx_details');
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('products');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('users');
    }
}
