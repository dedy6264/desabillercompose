<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewTableUga extends Migration
{
       // php artisan migrate --path=/database/migrations/tiara/2023_10_27_094744_add_new_table_uga.php

    public function up()
    {
         Schema::create('tia_user_group_assignments', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tia_user_id');
            $table->string('tele_group_id',128);
            $table->string('ug_assignment_unique_code',128)->unique();
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();
            $table->foreign('tia_user_id')->references('id')->on('tia_users');
        });
        // Schema::create('tia_circle_type', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('tia_circle_type_name',128)->unique();
        //     $table->string('tia_circle_type_code',128)->unique();
        //     $table->string('created_by');
        //     $table->string('updated_by');
        //     $table->timestamps();
        //     $table->foreign('tia_service_id')->references('id')->on('tia_services');
        //     $table->foreign('tia_user_group_assignment_id')->references('id')->on('tia_user_group_assignments');
        // });
         Schema::create('tia_group_service_assignments', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tia_user_group_assignment_id');
            $table->unsignedInteger('tia_service_id');
            $table->unsignedInteger('client_id')->default(0);
            $table->string('tia_circle_type',128);
            $table->string('gs_assignment_unique_code',128)->unique();
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();
            $table->foreign('tia_service_id')->references('id')->on('tia_services');
            $table->foreign('tia_user_group_assignment_id')->references('id')->on('tia_user_group_assignments');
            // $table->foreign('tia_circle_type_id')->references('id')->on('tia_circle_type');
        });
       
    }

    public function down()
    {
        Schema::dropIfExists('tia_group_service_assignments');
        Schema::dropIfExists('tia_user_group_assignments');
        // Schema::dropIfExists('tia_circle_type');
    }
}
