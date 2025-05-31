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

class TotalDataService
{
    
    public function incomeEntryTotal()
    {
        $userId = auth()->id();
        //$income = IncomeEntry::where(['user_id' => $userId])->first();
        $income = IncomeEntry::first();
        $salaryIncomeData = $income->salary_income ?? null;
        $salaryIncome = $salaryIncomeData['total'] ?? 0;

        $financialAssetData = $income->financial_assets_income ?? null;
        $financialAssetsIncome = $financialAssetData['total'] ?? 0;

        $incomeMinorData = $income->income_from_minor_spouse ?? null;
        $incomeMinor = $incomeMinorData['total'] ?? 0;

        $otherSourcesData = $income->other_sources_of_income ?? null;
        $otherSources = $otherSourcesData['total'] ?? 0;

        $capitalGainData = $income->capital_gain ?? null;
        $capitalGain = 0;

        if (!empty($capitalGainData)) {
            foreach ($capitalGainData as $key => $assets) {
                // Skip non-array keys like 'is_capital_gain'
                if (!is_array($assets)) {
                    continue;
                }

                foreach ($assets as $asset) {
                    $capitalGain += ($asset['sale_price'] ?? 0);// - ($asset['cost_price'] ?? 0);
                }
            }
        }

        $total = $salaryIncome + $capitalGain + $financialAssetsIncome + $incomeMinor + $otherSources;

        return [
            'salary_income'             => $salaryIncome,
            'capital_gain'              => $capitalGain,
            'financial_assets_income'   => $financialAssetsIncome,
            'income_from_minor_spouse'  => $incomeMinor,
            'other_sources_of_income'   => $otherSources,    
            'total'                     => $total
        ];

    }

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

    public function liabilityTotal()
    {
        $userId = auth()->id();
        $institutional = LiabilitiesEntry::where(['type_of_liabilities_entry' => 'institutional', 'user_id' => $userId])->sum('closing');
        $nonInstitutional = LiabilitiesEntry::where(['type_of_liabilities_entry' => 'non-institutional','user_id' => $userId])->sum('closing');
        $otherLiabilities = LiabilitiesEntry::where(['type_of_liabilities_entry' => 'other','user_id' => $userId])->sum('closing');

        $total = $institutional + $nonInstitutional + $otherLiabilities;

        return [
            'institutional'     => $institutional,
            'nonInstitutional'  => $nonInstitutional,
            'otherLiabilities'  => $otherLiabilities,
            'total'             => $total
        ];

    }

    public function expenseTotal()
    {
        $userId = auth()->id();
        $self_and_family = SelfAndFamilyExpense::where(['user_id' => $userId])
            ->sum(DB::raw('food_expenses + clothing_expenses + personal_expenses + family_expenses'));
        $housing = HousingExpense::where(['user_id' => $userId])
            ->sum(DB::raw('rental_payments + repair_maintenance + service_charge'));
        $transport = TransportExpense::where(['user_id' => $userId])
            ->sum(DB::raw('conveyance_payments + fuel_cost + repair_maintenance + fitness_renewals + driver_salary + garage_rent + ait_paid_on_car_renewal'));
        $utility = UtilityExpense::where(['user_id' => $userId])
            ->sum(DB::raw('electricity_bill + gas_bill + water_bill + telephone_bill + mobile_bill + internet_bill'));

        $education = EducationExpense::where(['user_id' => $userId])
            ->sum(DB::raw('tution_fees + exam_fees + private_tutor_salary + books_periodicals + uniform_shoes'));
        $vacation_festival = VacationFestivalExpense::where(['user_id' => $userId])
            ->sum(DB::raw('local_travel + foreign_travel + other_entertainment + religious_festive_expense + anniversary_expense + birthday_expense'));
        $finance = FinanceExpense::where(['user_id' => $userId])
            ->sum(DB::raw('institutional_loan + non_institutional_loan + other_loan'));

        $total = $self_and_family + $housing + $transport + $utility + $education + $vacation_festival + $finance;

        return [
            'self_and_family'   => $self_and_family,
            'housing'           => $housing,
            'transport'         => $transport,
            'utility'           => $utility,
            'education'         => $education,
            'vacation_festival' => $vacation_festival,
            'finance'           => $finance,
            'tax_paid_refund'   => $tax_paid_refund ?? 0,
            'total'             => $total ?? 0
        ];

    }
}
