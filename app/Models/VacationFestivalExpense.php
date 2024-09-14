<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VacationFestivalExpense extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'local_travel',
        'foreign_travel',
        'other_entertainment',
        'religious_festive_expense',
        'anniversary_expense',
        'birthday_expense',
        'year',
        'past_return'
    ];
}
