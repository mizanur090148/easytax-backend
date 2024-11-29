<?php

namespace App\Services;

use App\Models\AssetEntry;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Models\AssetEntries\AgriNonAgriLand;
use App\Models\DirectoryShare;
use App\Models\MotorVehicle;
use App\Models\BusinessAsset;
use App\Models\PartnershipBusiness;
use App\Models\Jewellery;
use App\Models\FurnitureEquipment;

class TotalDataService
{
    public function pastReturnTotal()
    {
        $userId = auth()->id();
        $partnershipBusiness = PartnershipBusiness::where(['past_return' => 1, 'user_id' => $userId])->sum('closing_capital');
        $businessAsset = BusinessAsset::where(['past_return' => 1,'user_id' => $userId])->sum(DB::raw('total_assets - closing_liabilities'));
        $directoryShare = DirectoryShare::where(['past_return' => 1,'user_id' => $userId])->sum(DB::raw('closing_no_of_shares * cost_per_share'));
        $nonAgriLand = AgriNonAgriLand::where(['past_return' => 1, 'type' => 'non-agri','user_id' => $userId])->sum('net_value_of_property');
        $agriLand = AgriNonAgriLand::where(['past_return' => 1, 'type' => 'agri','user_id' => $userId])->sum('net_value_of_property');
        $motorVehicle = MotorVehicle::where(['past_return' => 1,'user_id' => $userId])->sum('cost_with_registration');
        $jewellery = Jewellery::where(['past_return' => 1,'user_id' => $userId])->sum('closing_value');
        $furniture = FurnitureEquipment::where(['past_return' => 1,'user_id' => $userId])->sum('closing_value');

        $total = $partnershipBusiness + $businessAsset + $directoryShare + $nonAgriLand + $agriLand + $motorVehicle + $jewellery + $furniture;

        return [
            'partnershipBusiness'   => $partnershipBusiness,
            'businessAsset'         => $businessAsset,
            'directoryShare'        => $directoryShare,
            'nonAgriLand'           => $nonAgriLand,
            'agriLand'              => $agriLand,
            'motorVehicle'          => $motorVehicle,
            'jewellery'             => $jewellery,
            'furniture'             => $furniture,
            'total'                 => $total
        ];

    }

    public function assetsReturnTotal()
    {
        $userId = auth()->id();
        $partnershipBusiness = PartnershipBusiness::where(['past_return' => 1, 'user_id' => $userId])->sum('closing_capital');
        $businessAsset = BusinessAsset::where(['past_return' => 1,'user_id' => $userId])->sum(DB::raw('total_assets - closing_liabilities'));
        $directoryShare = DirectoryShare::where(['past_return' => 1,'user_id' => $userId])->sum(DB::raw('closing_no_of_shares * cost_per_share'));
        $nonAgriLand = AgriNonAgriLand::where(['past_return' => 1, 'type' => 'non-agri','user_id' => $userId])
            ->sum(DB::raw('net_value_of_property + renovation_deployment - cost_of_sale_portion'));
        $agriLand = AgriNonAgriLand::where(['past_return' => 1, 'type' => 'agri','user_id' => $userId])
            ->sum(DB::raw('net_value_of_property + renovation_deployment - cost_of_sale_portion'));
        $motorVehicle = MotorVehicle::where(['past_return' => 1,'user_id' => $userId])->sum('closing_cost');
        $jewellery = Jewellery::where(['past_return' => 1,'user_id' => $userId])
            ->sum(DB::raw('opening_value + purchase_value - sale_value'));
        $furniture = FurnitureEquipment::where(['past_return' => 1,'user_id' => $userId])
            ->sum(DB::raw('opening_value + purchase_value - sale_disposal_value'));

        $total = $partnershipBusiness + $businessAsset + $directoryShare + $nonAgriLand + $agriLand + $motorVehicle + $jewellery + $furniture;

        return [
            'partnershipBusiness'   => $partnershipBusiness,
            'businessAsset'         => $businessAsset,
            'directoryShare'        => $directoryShare,
            'nonAgriLand'           => $nonAgriLand,
            'agriLand'              => $agriLand,
            'motorVehicle'          => $motorVehicle,
            'jewellery'             => $jewellery,
            'furniture'             => $furniture,
            'total'                 => $total
        ];

    }
}
