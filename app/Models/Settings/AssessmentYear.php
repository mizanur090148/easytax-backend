<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssessmentYear extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'assessment_year',
        'status'
    ];
}
