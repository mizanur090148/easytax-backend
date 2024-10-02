<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransportExpense extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'conveyance_payments',
        'fuel_cost',
        'repair_maintenance',
        'fitness_renewals',
        'driver_salary',
        'garage_rent',
        'ait_paid_on_car_renewal',
        'year',
        'past_return'
    ];
}
