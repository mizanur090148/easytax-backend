<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssetEntry extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'business_assets',
        'partnership_business',
        'director_share_in_limited_company',
        'non_agriculture_land',
        'agriculture_land',
        'financial_assets',
        'motor_vehicles',
        'jewellery',
        'furniture_equipment',
        'other_asset',
        'asset_outside_bd',
        'cash_fund',
    ];
      protected $casts = [
          'business_assets'=> 'array',
          'partnership_business'=> 'array',
          'director_share_in_limited_company'=> 'array',
          'non_agriculture_land'=> 'array',
          'agriculture_land'=> 'array',
          'financial_assets'=> 'array',
          'motor_vehicles'=> 'array',
          'jewellery'=> 'array',
          'furniture_equipment'=> 'array',
          'other_asset'=> 'array',
          'asset_outside_bd'=> 'array',
          'cash_fund'=> 'array',
      ];

}
