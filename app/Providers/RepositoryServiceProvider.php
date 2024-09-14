<?php


namespace App\Providers;

use App\Repositories\InstitutionalLiabilitiesRepository;
use App\Repositories\Interfaces\InstitutionalLiabilitiesRepositoryInterface;
use Illuminate\Support\ServiceProvider;
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
            InstitutionalLiabilitiesRepositoryInterface::class,
            InstitutionalLiabilitiesRepository::class
        );
    }
}
