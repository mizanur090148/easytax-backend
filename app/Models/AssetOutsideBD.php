<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssetOutsideBD extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'name_of_asset',
        'country_of_asset',
        'closing_amount_in_bd',
        'type',
        'opening_balance',
        'new_investment',
        'withdrawal',
        'closing_balance',
        'past_return'
    ];
}
