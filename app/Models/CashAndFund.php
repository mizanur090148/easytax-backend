<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CashAndFund extends Model
{
    use HasFactory, SoftDeletes;

    // protected $fillable = [
    //     'user_id',
    //     'ac_type',
    //     'fund_type',
    //     'account_no',
    //     'bank_name',
    //     'closing_balance',
    //     'closing_amount',
    //     'year',
    //     'past_return'
    // ];

    protected $guarded = [
        'id'
    ];
}
