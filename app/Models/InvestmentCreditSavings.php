<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvestmentCreditSavings extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'type',
        'policy_number',
        'insured_amount',
        'current_year_amount',
        'bank_name',
        'account_no',
        'paid_amount',
        'total'
    ];
}
