<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DirectoryShare extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'name_of_company',
        'incorporation_no',
        'closing_capital',
        'closing_no_of_shares',
        'cost_per_share',
        'total_closing_value',
        'year',
        'past_return'
    ];
}
