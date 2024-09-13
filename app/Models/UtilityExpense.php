<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UtilityExpense extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'electricity_bill',
        'gas_bill',
        'water_bill',
        'telephone_bill',
        'mobile_bill',
        'internet_bill',
        'year',
        'past_return'
    ];
}
