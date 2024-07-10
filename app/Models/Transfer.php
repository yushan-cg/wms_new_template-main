<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    //transfer belum siap
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_id');
    }

    public function customer()
    {
        return $this->belongsTo(Partner::class);
    }
}
