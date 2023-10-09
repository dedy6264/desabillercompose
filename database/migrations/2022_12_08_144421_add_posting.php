<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPosting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postings', function (Blueprint $table) {
            $table->id();
            $table->string('email',128);
            $table->string('no_wa',15);
            $table->string('tittle',255);
            $table->text('isi');
            $table->timestamps();
        });
        // Schema::create('loker', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('email',128);
        //     $table->string('no_wa',15);
        //     $table->string('tittle',255);
        //     $table->text('isi');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postings');
    }
}
