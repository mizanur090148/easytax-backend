<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IncomeEntry extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'salary_income',
        'rental_income',
        'agricultural_income',
        'business_income',
        'capital_gain',
        'financial_assets_income',
        'partnership_firm_income',
        'income_from_minor_spouse',
        'foreign_income',
        'other_sources_of_income',
        'gift_reward',
        'year',
        'past_return'
    ];

    protected $casts = [
        'salary_income' => 'array',
        'rental_income' => 'array',
        'agricultural_income' => 'array',
        'business_income' => 'array',
        'capital_gain' => 'array',
        'financial_assets_income' => 'array',
        'partnership_firm_income' => 'array',
        'income_from_minor_spouse' => 'array',
        'foreign_income' => 'array',
        'other_sources_of_income' => 'array',
        'gift_reward' => 'array',
    ];

    // Example mutator for automatically encoding the JSON data
    public function setSalaryIncomeAttribute($value)
    {
        $this->attributes['salary_income'] = json_encode($value);
    }

    // Example accessor for automatically decoding the JSON data
    public function getSalaryIncomeAttribute($value)
    {
        return json_decode($value, true);
    }

     // Example mutator for automatically encoding the JSON data
    public function setCapitalGainAttribute($value)
    {
        $this->attributes['capital_gain'] = json_encode($value);
    }

    // Example accessor for automatically decoding the JSON data
    public function getCapitalGainAttribute($value)
    {
        return json_decode($value, true);
    }

    // Example mutator for automatically encoding the JSON data
    public function setFinancialAssetsIncomeAttribute($value)
    {
        $this->attributes['financial_assets_income'] = json_encode($value);
    }

    // Example accessor for automatically decoding the JSON data
    public function getFinancialAssetsIncomeAttribute($value)
    {
        return json_decode($value, true);
    }

    // Example mutator for automatically encoding the JSON data
    public function setOtherSourcesOfIncomeAttribute($value)
    {
        $this->attributes['other_sources_of_income'] = json_encode($value);
    }

    // Example accessor for automatically decoding the JSON data
    public function getOtherSourcesOfIncomeAttribute($value)
    {
        return json_decode($value, true);
    }
}
