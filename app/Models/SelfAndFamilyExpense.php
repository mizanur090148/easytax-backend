<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SelfAndFamilyExpense extends Model
{
	use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'food_expenses',
        'clothing_expenses',
        'personal_expenses',
        'family_expenses',
        'year',
        'past_return'
    ];
}
