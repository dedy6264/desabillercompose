<?php

namespace App\Models\Mimo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'product_types';
}
