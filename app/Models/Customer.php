<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'address', 'attention', 'tel', 'client_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
