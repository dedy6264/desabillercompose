<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNoGenerator extends Migration
{
       // php artisan migrate --path=/database/migrations/mimo/2023_11_10_082859_add_no_generator.php

    public function up()
    {
        Schema::create('no_generator', function (Blueprint $table) {
            $table->id();
            $table->string('prefix', 128)->nullable()->default('');
            $table->string('data_type', 128)->nullable()->default('');
            $table->unsignedInteger('seqvalue')->nullable()->default(0);
            $table->unsignedInteger('leadingzero')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('no_generator');
    }
}
