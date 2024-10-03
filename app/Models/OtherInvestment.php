<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OtherInvestment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'type',
        'name_of_zakat_fund',
        'account_no',
        'name_of_fund',
        'ref_no',
        'contribution_amount',
        'total',
    ];
}
