<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jewellery extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'type_id',
        'closing_qty',
        'closing_value',
        'new_purchase_qty',
        'purchase_value',
        'sale_qty',
        'sale_value',
        'new_purchase_qty',
        'opening_qty',
        'opening_value',
        'year',
        'past_return'
    ];
}
