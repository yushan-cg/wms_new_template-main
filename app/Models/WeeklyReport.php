<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyReport extends Model
{
    use HasFactory;

    protected $table = 'weekly_reports';

    protected $fillable = [
        'company_id',
        'company_name',
        'startDate',
        'endDate',
        'week_number',
        'total_inflow_quantity',
        'total_outflow_quantity',
        'net_change_quantity',
        'remaining_quantity',
    ];

}