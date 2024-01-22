<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeTableTiara extends Migration
{
// php artisan migrate --path=/database/migrations/tiara/2023_10_25_070309_make_table_tiara.php

    public function up()
    {
        Schema::create('tia_services', function (Blueprint $table) {
            $table->id();
            $table->string('service_name',128)->unique();
            $table->string('service_code',128)->unique();
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();
        });
        Schema::create('tia_users', function (Blueprint $table) {
            $table->id();
            $table->string('name',128)->unique();
            $table->string('username',128)->default('');
            $table->string('tele_chat_id',128)->default('');
            $table->string('tele_first_name',128)->default('');
            $table->string('tele_last_name',128)->default('');
            $table->string('phone_number',128)->unique()->default('');
            $table->string('email',64)->unique();
            $table->string('ticket_code',128)->unique()->default("");
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();
        });
        Schema::create('tia_user_service_assignments', function (Blueprint $table) {//dh ga perlu
            $table->id();
            $table->unsignedInteger('tia_user_id');
            $table->unsignedInteger('tia_service_id');
            $table->string('us_assignment_unique_code',128)->unique();
            $table->string('created_by');
            $table->string('updated_by');
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
        Schema::dropIfExists('tia_user_service_assignments');
        Schema::dropIfExists('tia_services');
        Schema::dropIfExists('tia_users');
    }
}
