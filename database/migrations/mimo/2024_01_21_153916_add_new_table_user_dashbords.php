<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewTableUserDashbords extends Migration
{
          // php artisan migrate --path=/database/migrations/mimo/2024_01_21_153916_add_new_table_user_dashbords.php

    public function up()
    {
         Schema::create('role_segment_dashboards', function (Blueprint $table) {
            $table->id();
            $table->string('role_segment_name', 128)->unique();
            $table->string('role_segment_code', 128);
            $table->string('role', 255)->nullable();
        });
        Schema::create('user_dashboard', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128);
            $table->string('password', 128);
            $table->string('email', 128)->unique();
            $table->unsignedInteger('role_segment_id');
            $table->string('hierarchy_type', 128)->nullable();
            $table->unsignedInteger('hiearchy_id')->nullable();
            $table->foreign('role_segment_id')->references('id')->on('role_segment_dashboards');
        });
       
    }

    public function down()
    {
        Schema::dropIfExists('user_dashboard');
        Schema::dropIfExists('role_segment_dashboards');
    }
}
