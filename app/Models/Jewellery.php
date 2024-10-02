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
        'type',
        'closing_qty',
        'closing_value',
        'year',
        'past_return'
    ];
}
