<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $table = 'floor_locations';

    use HasFactory;
    public function products()
    {
        return $this->hasMany(Product::class, 'floor_id', 'id');
    }
}
