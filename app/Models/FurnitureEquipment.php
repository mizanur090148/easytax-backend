<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FurnitureEquipment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'furniture_equipments';

    protected $fillable = [
        'user_id',
        'type_id',
        'closing_qty',
        'closing_value',
        'year',
        'past_return'
    ];
}
