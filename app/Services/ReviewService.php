<?php

namespace App\Services;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Models\AssetEntry;
use App\Models\IncomeEntry;
use App\Models\AssetEntries\AgriNonAgriLand;
use App\Models\DirectoryShare;
use App\Models\MotorVehicle;
use App\Models\BusinessAsset;
use App\Models\PartnershipBusiness;
use App\Models\Jewellery;
use App\Models\FurnitureEquipment;
use App\Models\LiabilitiesEntry;
use App\Models\SelfAndFamilyExpense;
use App\Models\HousingExpense;
use App\Models\TransportExpense;
use App\Models\UtilityExpense;
use App\Models\EducationExpense;
use App\Models\VacationFestivalExpense;
use App\Models\FinanceExpense;

class ReviewService
{
    public function update($id, array $data)
    {
        // DB::beginTransaction();
        // try {
        //     $assetEntry = AgriNonAgriLand::findOrFail($id);
        //     $assetEntry->update($data);
        //     DB::commit();
        //     return $assetEntry;
        // } catch (ModelNotFoundException $e) {
        //     DB::rollBack();
        //     throw new \Exception('AssetEntry not found', 404);
        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     throw $e;
        // }
    }
}
