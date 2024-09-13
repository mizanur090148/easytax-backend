<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationExpense extends Model
{
   use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'tution_fees',
        'exam_fees',
        'private_tutor_salary',
        'books_periodicals',
        'uniform_shoes',
        'year',
        'past_return'
    ];
}
