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
        'incorporation_date',
        'closing_no_of_shares',
        'cost_per_share',
        'purchased_no_of_shares',
        'purchased_cost_per_share',
        'sold_no_of_shares',
        'sold_cost_per_share',
        'year',
        'past_return'
    ];

    public function getTotalClosingValueAttribute() 
    {
        return $this->closing_no_of_shares * $this->cost_per_share 
            + $this->purchased_no_of_shares * $this->purchased_cost_per_share
            - $this->sold_no_of_shares * $this->sold_cost_per_share;
    }
}
