<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LiabilitiesEntry extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "user_id",
        "type_of_liabilities_entry",
        "bank_fi_name",
        "account_no",
        "opening",
        "new_loan",
        "principal_paid",
        "interest_paid",
        "closing",
        "total_principal",
        "total_interest",
        "name_of_person",
        "etin_no",
        "name_of_loan",
        "type",
        "total_closing",
    ];
}
