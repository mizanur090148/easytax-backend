<?php


namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\AgriNonAgriRepository;
use App\Repositories\Interfaces\AgriNonAgriRepositoryInterface;
use App\Repositories\FinancialAssetRepository;
use App\Repositories\Interfaces\FinancialAssetRepositoryInterface;


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
    }
}