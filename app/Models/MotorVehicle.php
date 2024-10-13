<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MotorVehicle extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'type_id',
        'capacity',
        'brand',
        'registration_no',
        'cost_with_registration',
        'cost_of_sale',
        'closing_cost',
        'year',
        'past_return'
    ];
}
