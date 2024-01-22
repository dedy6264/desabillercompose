<?php

namespace Database\Seeders;
use App\Models\Mimo\{ProductType, ProductCategory};

use Illuminate\Database\Seeder;

class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductType::insert([[
            'product_type_name' => "POSTPAID",
            'product_type_code' => "POSTPAID",
            'created_by' => "sys",
            'updated_by' => "sys",
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'product_type_name' => "PREPAID",
            'product_type_code' => "PREPAID",
            'created_by' => "sys",
            'updated_by' => "sys",
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'product_type_name' => "DIRECT",
            'product_type_code' => "DIRECT",
            'created_by' => "sys",
            'updated_by' => "sys",
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
        ProductCategory::insert([[
            'product_category_name' => "PULSA",
            'product_category_code' => "PULSA",
            'created_by' => "sys",
            'updated_by' => "sys",
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'product_category_name' => "GAME",
            'product_category_code' => "GAME",
            'created_by' => "sys",
            'updated_by' => "sys",
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
