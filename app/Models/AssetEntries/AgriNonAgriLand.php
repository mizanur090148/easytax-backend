<?php

namespace App\Models\AssetEntries;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Settings\Setting;

class AgriNonAgriLand extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'type',
        'property_type_id',
        'location_of_property',
        'date_of_purchase',
        'size_of_property',
        'net_value_of_property',
        'renovation_deployment',
        'sale_of_portion',
        'cost_of_sale_portion',
        'year',
        'past_return'
    ];

    public function propertyType()
    {
        return $this->belongsTo(Setting::class, 'property_type_id')->withDefault();
    }
}
