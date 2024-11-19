<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFeaturesTable extends Migration
{
               // php artisan migrate --path=/database/migrations/mimo/2024_04_04_062945_add_new_features_table.php

    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('feature_name',128);
            $table->string('created_by',128);
            $table->string('updated_by',128);
            $table->timestamps();
        });  
        Schema::create('feature_assignment', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('feature_id');
            $table->foreign('feature_id')->references('id')->on('features');
            $table->unsignedInteger('merchant_id');
            $table->foreign('merchant_id')->references('id')->on('merchants');
            $table->unsignedInteger('index')->unique();
            $table->string('created_by',128);
            $table->string('updated_by',128);
            $table->timestamps();
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('features');
        Schema::dropIfExists('feature_assignment');
    }
}
