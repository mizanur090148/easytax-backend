<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Settings\Setting;

class FurnitureEquipment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'furniture_equipments';

    protected $fillable = [
        'user_id',
        'type_id',
        'closing_qty',
        'closing_value',
        'new_purchase_qty',
        'purchase_value',
        'sale_disposal_qty',
        'sale_disposal_value',
        'opening_qty',
        'opening_value',
        'year',
        'past_return'
    ];

    public function propertyType()
    {
        return $this->belongsTo(Setting::class, 'type_id')->withDefault();
    }
}
