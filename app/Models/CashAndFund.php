<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CashAndFund extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'type',
        'ac_type',
        'type_of_fund',
        'account_no',
        'bank_name',
        'opening_balance',
        'deposit',
        'withdraw',
        'closing_balance',
        'closing_amount',
        'cash_in_hand',
        'year',
        'past_return'
    ];
}
