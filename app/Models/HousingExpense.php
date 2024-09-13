<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HousingExpense extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'rental_payments',
        'repair_maintenance',
        'service_charge',
        'year',
        'past_return'
    ];
}
