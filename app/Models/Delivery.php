<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $table = 'delivery'; 

    public function products()
{
    return $this->belongsToMany(Product::class, 'delivery_product')->withPivot('quantity');
}

}

