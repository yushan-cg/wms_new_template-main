<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rack extends Model
{
    protected $table = 'rack_locations';

    use HasFactory;

    public function products()
    {
        return $this->hasMany(Product::class, 'rack_id', 'id');
    }
}
