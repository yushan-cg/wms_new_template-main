<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRequest extends Model
{
    use HasFactory;

    protected $table = 'product_request';

    protected $fillable = [
        'company_name',
        'product_name',
        'product_desc',
        'carton_quantity',
        'item_per_carton',
        'product_dimensions',
        'weight_per_item',
        'weight_per_carton',
        'total_weight',
        'product_price',
        'product_image',
        'address',
        'phone_number',
        'email',
        'product_code'
    ];



}
