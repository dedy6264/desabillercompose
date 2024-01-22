<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewTableUserDashbords extends Migration
{
          // php artisan migrate --path=/database/migrations/mimo/2024_01_21_153916_add_new_table_user_dashbords.php

    public function up()
    {
        Schema::create('user_dashboard', function (Blueprint $table) {
            $table->id();
            $table->string('username', 128)->unique();
            $table->string('password', 128);
            $table->string('email', 128)->unique();
            $table->unsignedInteger('role_segment_id');
            $table->string('hierarchy_type', 128);
            $table->unsignedInteger('hiearchy_id');
        });
        Schema::create('role_segment_dashboards', function (Blueprint $table) {
            $table->id();
            $table->string('role_segment_name', 128)->unique();
            $table->string('role', 128);
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_dashboard');
        Schema::dropIfExists('role_segment_dashboards');
    }
}
