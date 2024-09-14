<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'disabilities' => 'boolean',
        'freedom_fighter' => 'boolean',
        'children_disabled' => 'boolean'
    ];

    public function userDetails()
    {
        return $this->hasOne(UserDetails::class);
    }

}
