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
        $income = IncomeEntry::where(['user_id' => $userId])->first();
        $salaryIncome = $income->salary_income ?? null;
        // Calculate total salary income by summing up all components
        // $totalSalaryIncome = 
        //     ($salaryIncome['basic_salary'] ?? 0) +
        //     ($salaryIncome['house_rent_allowance'] ?? 0) +
        //     ($salaryIncome['medical_allowance'] ?? 0) +
        //     ($salaryIncome['conveyance_allowance'] ?? 0) +
        //     ($salaryIncome['festival_bonus'] ?? 0) +
        //     ($salaryIncome['bangla_noboborsho_allowance'] ?? 0) +
        //     ($salaryIncome['interest_receivable_on_provident_fund'] ?? 0) +
        //     ($salaryIncome['advance_due_salary'] ?? 0) +
        //     ($salaryIncome['special_staff_allowance'] ?? 0) +
        //     ($salaryIncome['leave_allowance'] ?? 0) +
        //     ($salaryIncome['honorarium_reward'] ?? 0) +
        //     ($salaryIncome['overtime_allowance'] ?? 0) +
        //     ($salaryIncome['lump_sum_grant'] ?? 0) +
        //     ($salaryIncome['gratuity'] ?? 0) +
        //     ($salaryIncome['any_other_allowance'] ?? 0);

        $total = ($salaryIncome['total'] ?? 0);

        return [
            'salary_income'          => $salaryIncome['total'] ?? 0,
            'total'                 => $total
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
