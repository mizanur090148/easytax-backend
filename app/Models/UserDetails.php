<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Settings\Setting;

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

    public function circle()
    {
        return $this->belongsTo(Setting::class, 'circle_id', 'id')->withDefault();
    }

    public function zone()
    {
        return $this->belongsTo(Setting::class, 'zone_id', 'id')->withDefault();
    }

    public function taxPayerLocation()
    {
        return $this->belongsTo(Setting::class, 'tax_payer_location_id', 'id')->withDefault();
    }

}
