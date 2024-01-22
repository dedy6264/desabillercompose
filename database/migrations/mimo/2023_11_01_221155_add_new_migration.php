<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewMigration extends Migration
{
// php artisan migrate --path=/database/migrations/mimo/2023_11_01_221155_add_new_migration.php

    public function up()
    {
        //DROP 
        // Schema::dropIfExists('user_outlets');
        // Schema::dropIfExists('outlet_devices');
        // Schema::dropIfExists('merchant_outlets');
        // Schema::dropIfExists('merchants');
        // Schema::dropIfExists('clients');
        // Schema::dropIfExists('product_poses');
        // Schema::dropIfExists('segment_products');
        // Schema::dropIfExists('product_pos');
        // Schema::dropIfExists('product_billers');
        // Schema::dropIfExists('product_biller_providers');
        // Schema::dropIfExists('product_categories');
        // Schema::dropIfExists('product_types');
        // Schema::dropIfExists('segments');

        //CREATE
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_name', 128);
            $table->string('created_by', 128)->nullable()->default('');
            $table->string('updated_by', 128)->nullable()->default('');
            $table->string('deleted_by', 128)->nullable()->default('');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('client_id');
            $table->string('merchant_name', 128);
            $table->string('created_by', 128)->nullable()->default('');
            $table->string('updated_by', 128)->nullable()->default('');
            $table->string('deleted_by', 128)->nullable()->default('');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients');
        });
        Schema::create('merchant_outlets', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('merchant_id');
            $table->string('merchant_outlet_name', 128);
            $table->unsignedInteger('segment_id')->nullable()->default(0);
            $table->string('segment_name', 128)->nullable()->default('');
            $table->string('created_by', 128)->nullable()->default('');
            $table->string('updated_by', 128)->nullable()->default('');
            $table->string('deleted_by', 128)->nullable()->default('');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
            $table->foreign('merchant_id')->references('id')->on('merchants');
        });
        Schema::create('outlet_devices', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('merchant_outlet_id');
            $table->string('device_type', 128);//mpos, mobile, desktop
            $table->string('device_sn', 128)->nullable()->default('');
            $table->string('created_by', 128)->nullable()->default('');
            $table->string('updated_by', 128)->nullable()->default('');
            $table->string('deleted_by', 128)->nullable()->default('');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
            $table->foreign('merchant_outlet_id')->references('id')->on('merchant_outlets');
        });
        Schema::create('user_outlets', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('merchant_outlet_id');
            $table->string('nickname', 128);
            $table->string('outlet_username', 128);
            $table->string('outlet_password', 128);
            $table->string('created_by', 128)->nullable()->default('');
            $table->string('updated_by', 128)->nullable()->default('');
            $table->string('deleted_by', 128)->nullable()->default('');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
            $table->foreign('merchant_outlet_id')->references('id')->on('merchant_outlets');
        });
        ////PRODUCT
        Schema::create('product_types', function (Blueprint $table) {
            $table->id();
            $table->string('product_type_name', 128);
            $table->string('product_type_code', 128);
            $table->string('created_by', 128)->nullable()->default('');
            $table->string('updated_by', 128)->nullable()->default('');
            $table->string('deleted_by', 128)->nullable()->default('');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->string('product_category_name', 128);
            $table->string('product_category_code', 128);
            $table->string('created_by', 128)->nullable()->default('');
            $table->string('updated_by', 128)->nullable()->default('');
            $table->string('deleted_by', 128)->nullable()->default('');
            $table->unsignedInteger('merchant_id')->default(0);
            $table->string('merchant_name', 128)->default('');
            $table->boolean('updateable')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
        Schema::create('product_poses', function (Blueprint $table) {
            $table->id();
            $table->string('product_name', 128);
            $table->string('product_code', 128);
            $table->unsignedInteger('product_type_id');
            $table->unsignedInteger('product_category_id');
            $table->unsignedInteger('merchant_id');
            $table->string('merchant_name', 128);
            $table->double('product_price_provider');
            $table->double('product_price');
            $table->boolean('is_open');
            $table->string('created_by', 128)->nullable()->default('');
            $table->string('updated_by', 128)->nullable()->default('');
            $table->string('deleted_by', 128)->nullable()->default('');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
        ////SEGMENT
        Schema::create('segments', function (Blueprint $table) {
            $table->id();
            $table->string('segment_name', 128);
            $table->timestamp('deleted_at')->nullable();
            $table->string('created_by', 128)->nullable()->default('');
            $table->string('updated_by', 128)->nullable()->default('');
            $table->string('deleted_by', 128)->nullable()->default('');
            $table->timestamps();
        });

        Schema::create('product_biller_providers', function (Blueprint $table) {
            $table->id();
            $table->string('product_provider_name', 128);
            $table->string('product_provider_code', 128);
            $table->float('product_provider_price')->default(0);
            $table->float('product_provider_admin_fee')->default(0);
            $table->float('product_provider_merchant_fee')->default(0);
            $table->boolean('is_open')->default(true);
            $table->unsignedInteger('product_type_id');
            $table->unsignedInteger('product_category_id');
            $table->string('created_by', 128)->nullable()->default('');
            $table->string('updated_by', 128)->nullable()->default('');
            $table->string('deleted_by', 128)->nullable()->default('');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
            $table->foreign('product_type_id')->references('id')->on('product_types');
            $table->foreign('product_category_id')->references('id')->on('product_categories');
        });
        Schema::create('product_billers', function (Blueprint $table) {
            $table->id();
            $table->string('product_name', 128);
            $table->string('product_code', 128);
            $table->boolean('is_open')->default(true);
            $table->unsignedInteger('product_biller_provider_id');
            $table->unsignedInteger('product_type_id');
            $table->unsignedInteger('product_category_id');
            $table->string('created_by', 128)->nullable()->default('');
            $table->string('updated_by', 128)->nullable()->default('');
            $table->string('deleted_by', 128)->nullable()->default('');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
            $table->foreign('product_biller_provider_id')->references('id')->on('product_biller_providers');
            $table->foreign('product_type_id')->references('id')->on('product_types');
            $table->foreign('product_category_id')->references('id')->on('product_categories');
        
        });
        Schema::create('product_pos', function (Blueprint $table) {
            $table->id();
            $table->string('product_name', 128);
            $table->string('product_code', 128);
            $table->boolean('is_open')->default(true);
            $table->float('product_price');
            $table->unsignedInteger('product_price_provider');
            $table->unsignedInteger('product_type_id');
            $table->unsignedInteger('product_category_id');
            $table->unsignedInteger('merchant_id');
            $table->string('merchant_name', 128);
            $table->string('created_by', 128)->nullable()->default('');
            $table->string('updated_by', 128)->nullable()->default('');
            $table->string('deleted_by', 128)->nullable()->default('');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
            $table->foreign('product_type_id')->references('id')->on('product_types');
            $table->foreign('product_category_id')->references('id')->on('product_categories');
        
        });
        Schema::create('segment_products', function (Blueprint $table) {
            $table->id();
            $table->string('segment_name', 128);
            $table->unsignedInteger('segment_id');
            $table->unsignedInteger('product_biller_id');
            $table->unsignedInteger('product_biller_provider_id');
            $table->float('product_price')->default(0);
            $table->float('product_admin_fee')->default(0);
            $table->float('product_merchant_fee')->default(0);
            $table->boolean('is_open')->default(true);
            $table->timestamp('deleted_at')->nullable();
            $table->string('created_by', 128)->nullable()->default('');
            $table->string('updated_by', 128)->nullable()->default('');
            $table->string('deleted_by', 128)->nullable()->default('');
            $table->timestamps();
            $table->foreign('segment_id')->references('id')->on('segments');
            $table->foreign('product_biller_id')->references('id')->on('product_billers');
            $table->foreign('product_biller_provider_id')->references('id')->on('product_biller_providers');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
