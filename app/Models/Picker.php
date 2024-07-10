<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picker extends Model
{
    use HasFactory;

    public function returnStock()
    {
        return $this->belongsTo(ReturnStock::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

