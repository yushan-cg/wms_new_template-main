<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

public function getUsers()
{
    return $this->users()->select('id', 'name')->get();
}

public function products()
{
    return $this->hasMany(Product::class);
}

}
