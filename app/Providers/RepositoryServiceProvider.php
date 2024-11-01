<?php


namespace App\Providers;

use App\Repositories\Interfaces\PartnershipBusinessRepositoryInterface;
use App\Repositories\PartnershipBusinessRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\GovSecuritiesRepository;
use App\Repositories\InstitutionalLiabilitiesRepository;
use App\Repositories\Interfaces\GovSecuritiesRepositoryInterface;
use App\Repositories\Interfaces\InstitutionalLiabilitiesRepositoryInterface;
use App\Repositories\Interfaces\ListedSecuritiesRepositoryInterface;
use App\Repositories\Interfaces\OtherInvestmentRepositoryInterface;
use App\Repositories\Interfaces\RetirementPlanRepositoryInterface;
use App\Repositories\Interfaces\SavingsPlanRepositoryInterface;
use App\Repositories\Interfaces\Settings\ZoneRepositoryInterface;
use App\Repositories\ListedSecuritiesRepository;
use App\Repositories\NonInstitutionalLiabilitiesRepository;
use App\Repositories\Interfaces\NonInstitutionalLiabilitiesRepositoryInterface;
use App\Repositories\OtherInvestmentRepository;
use App\Repositories\OtherLiabilitiesRepository;
use App\Repositories\Interfaces\OtherLiabilitiesRepositoryInterface;
use App\Repositories\RetirementPlanRepository;
use App\Repositories\SavingsPlanRepository;
use App\Repositories\Settings\ZoneRepository;
use App\Repositories\BusinessAssetRepository;
use App\Repositories\Interfaces\BusinessAssetRepositoryInterface;
use App\Repositories\AgriNonAgriRepository;
use App\Repositories\Interfaces\AgriNonAgriRepositoryInterface;
use App\Repositories\FinancialAssetRepository;
use App\Repositories\Interfaces\FinancialAssetRepositoryInterface;
use App\Repositories\MotorVehicleRepository;
use App\Repositories\Interfaces\MotorVehicleRepositoryInterface;
use App\Repositories\FurnitureEquipmentRepository;
use App\Repositories\Interfaces\FurnitureEquipmentRepositoryInterface;
use App\Repositories\JewelleryRepository;
use App\Repositories\Interfaces\JewelleryRepositoryInterface;
use App\Repositories\CashAndFundRepository;
use App\Repositories\Interfaces\CashAndFundRepositoryInterface;
use App\Repositories\SelfFamilyExpenseRepository;
use App\Repositories\Interfaces\SelfFamilyExpenseRepositoryInterface;
use App\Repositories\HousingExpenseRepository;
use App\Repositories\Interfaces\HousingExpenseRepositoryInterface;
use App\Repositories\UtilityExpenseRepository;
use App\Repositories\Interfaces\UtilityExpenseRepositoryInterface;
use App\Repositories\EducationExpenseRepository;
use App\Repositories\Interfaces\EducationExpenseRepositoryInterface;
use App\Repositories\FinanceExpenseRepository;
use App\Repositories\Interfaces\FinanceExpenseRepositoryInterface;
use App\Repositories\TransportExpenseRepository;
use App\Repositories\Interfaces\TransportExpenseRepositoryInterface;
use App\Repositories\VacationFestivalExpenseRepository;
use App\Repositories\Interfaces\VacationFestivalExpenseRepositoryInterface;
use App\Repositories\Settings\TypeOfVehicleRepository;
use App\Repositories\Interfaces\Settings\TypeOfVehicleRepositoryInterface;
use App\Repositories\Settings\CircleRepository;
use App\Repositories\Interfaces\Settings\CircleRepositoryInterface;
use App\Repositories\Settings\SettingRepository;
use App\Repositories\Interfaces\Settings\SettingRepositoryInterface;
use App\Repositories\DirectoryShareRepository;
use App\Repositories\Interfaces\DirectoryShareRepositoryInterface;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            AgriNonAgriRepositoryInterface::class,
            AgriNonAgriRepository::class
        );
        $this->app->bind(
            FinancialAssetRepositoryInterface::class,
            FinancialAssetRepository::class
        );
        $this->app->bind(
            MotorVehicleRepositoryInterface::class,
            MotorVehicleRepository::class
        );
        $this->app->bind(
            FurnitureEquipmentRepositoryInterface::class,
            FurnitureEquipmentRepository::class
        );
        $this->app->bind(
            JewelleryRepositoryInterface::class,
            JewelleryRepository::class
        );
        $this->app->bind(
            CashAndFundRepositoryInterface::class,
            CashAndFundRepository::class
        );
        $this->app->bind(
            SelfFamilyExpenseRepositoryInterface::class,
            SelfFamilyExpenseRepository::class
        );
        $this->app->bind(
            HousingExpenseRepositoryInterface::class,
            HousingExpenseRepository::class
        );
        $this->app->bind(
            UtilityExpenseRepositoryInterface::class,
            UtilityExpenseRepository::class
        );
        $this->app->bind(
            EducationExpenseRepositoryInterface::class,
            EducationExpenseRepository::class
        );
        $this->app->bind(
            FinanceExpenseRepositoryInterface::class,
            FinanceExpenseRepository::class
        );
        $this->app->bind(
            TransportExpenseRepositoryInterface::class,
            TransportExpenseRepository::class
        );
        $this->app->bind(
            VacationFestivalExpenseRepositoryInterface::class,
            VacationFestivalExpenseRepository::class
        );
        $this->app->bind(
            InstitutionalLiabilitiesRepositoryInterface::class,
            InstitutionalLiabilitiesRepository::class
        );
        $this->app->bind(
            NonInstitutionalLiabilitiesRepositoryInterface::class,
            NonInstitutionalLiabilitiesRepository::class
        );
        $this->app->bind(
            OtherLiabilitiesRepositoryInterface::class,
            OtherLiabilitiesRepository::class
        );
        $this->app->bind(
            SavingsPlanRepositoryInterface::class,
            SavingsPlanRepository::class
        );
        $this->app->bind(
            SettingRepositoryInterface::class,
            SettingRepository::class
        );
        $this->app->bind(
            GovSecuritiesRepositoryInterface::class,
            GovSecuritiesRepository::class
        );
        $this->app->bind(
            ListedSecuritiesRepositoryInterface::class,
            ListedSecuritiesRepository::class
        );
        $this->app->bind(
            RetirementPlanRepositoryInterface::class,
            RetirementPlanRepository::class
        );

        $this->app->bind(
            OtherInvestmentRepositoryInterface::class,
            OtherInvestmentRepository::class
        );
        $this->app->bind(
            CircleRepositoryInterface::class,
            CircleRepository::class
        );

        $this->app->bind(
            ZoneRepositoryInterface::class,
            ZoneRepository::class
        );

        $this->app->bind(
            BusinessAssetRepositoryInterface::class,
            BusinessAssetRepository::class
        );

         $this->app->bind(
            DirectoryShareRepositoryInterface::class,
            DirectoryShareRepository::class
        );

        $this->app->bind(
            PartnershipBusinessRepositoryInterface::class,
            PartnershipBusinessRepository::class
        );

    }
}
