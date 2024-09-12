<?php


namespace App\Providers;

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
    }
}