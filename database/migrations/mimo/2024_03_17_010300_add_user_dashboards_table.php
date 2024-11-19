<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserDashboardsTable extends Migration
{
            // php artisan migrate --path=/database/migrations/mimo/2024_03_17_010300_add_user_dashboards_table.php

    public function up()
    {
        Schema::create('user_dashboards', function (Blueprint $table) {
            $table->id();
            $table->string('username',128);
            $table->string('email',128)->unique();
            $table->string('password',128);
            $table->string('role',255)->default('');
            $table->unsignedInteger('client')->default(0);
            $table->unsignedInteger('merchant')->default(0);
            $table->unsignedInteger('merchant_outlet')->default(0);
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
        Schema::dropIfExists('user_dashboards');
    }
}
