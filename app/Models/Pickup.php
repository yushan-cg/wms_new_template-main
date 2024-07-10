<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'pickup_id';
    protected $fillable = [
        'sender_address',
        'sender_state',
        'sender_postcode',
        'sender_name',
        'sender_contact_no',
        'receiver_address',
        'receiver_state',
        'receiver_postcode',
        'receiver_name',
        'receiver_contact_no',
        'time_pickup',
        'date_pickup',
        'carton_quantity',
        'pallet_quantity',
        'remarks',
        '_token', // Include the _token field
    ];

    use HasFactory;
}
