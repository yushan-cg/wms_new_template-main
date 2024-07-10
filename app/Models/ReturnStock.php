<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnStock extends Model
{
    use HasFactory;

    protected $table = 'return_stock';

    protected $fillable = [
        'user_id',
        'company_id',
        'address',
        'phone_number',
        'email',
        'return_no',
        'receive_status'
    ];

    public function pickers()
    {
        return $this->hasMany(Picker::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'return_stock_pivot')
                    ->withPivot('status', 'quantity', 'remark')
                    ->when($this->receive_status === 'Received', function ($query) {
                        // If receive_status is 'Received', include the 'status' from 'pickers' table
                        $query->leftJoin('pickers', function ($join) {
                            $join->on('return_stock_pivot.product_id', '=', 'pickers.product_id')
                                 ->where('pickers.return_stock_id', $this->id);
                        })
                        ->select('products.*', 'pickers.status as pivot_status');
                    });
    }
}
