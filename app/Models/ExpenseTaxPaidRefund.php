<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExpenseTaxPaidRefund extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'challan_type',
        'challan_no',
        'head_of_income',
        'date',
        'deposit_type',
        'amount',
        'bank',
        'branch',
        'assessment_year',
        'refund_authority',
        'type',
        'status'
    ];
}
