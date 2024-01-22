<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentTable extends Migration
{
          // php artisan migrate --path=/database/migrations/mimo/2023_11_11_103424_add_payment_table.php

    public function up()
    {
        Schema::create('payment_method_category', function (Blueprint $table) {
            $table->id();
            $table->string('payment_method_category_name', 128)->unique();
        });
        Schema::create('payment_method', function (Blueprint $table) {
            $table->id();
            $table->string('payment_method_name', 128)->unique();
            $table->unsignedInteger('payment_method_category_id');
            $table->foreign('payment_method_category_id')->references('id')->on('payment_method_category');
        });
    }

    public function down()
    {
       Schema::dropIfExists('payment_method');
       Schema::dropIfExists('payment_method_category');
    }
}
