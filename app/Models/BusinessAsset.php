<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessAsset extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'name_of_business',
        'type_of_business',
        'address',
        'total_assets',
        'closing_liabilities',
       // 'closing_capital',
        'year',
        'past_return'
    ];
}
