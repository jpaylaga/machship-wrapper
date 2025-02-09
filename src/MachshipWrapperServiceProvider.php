<?php

namespace Jpaylaga\MachshipWrapper;

use Illuminate\Support\ServiceProvider;
use Jpaylaga\MachshipWrapper\Contracts\AttachmentsContract;
use Jpaylaga\MachshipWrapper\Contracts\AuthenticateContract;
use Jpaylaga\MachshipWrapper\Contracts\CarrierInvoicesContract;
use Jpaylaga\MachshipWrapper\Contracts\CompaniesContract;
use Jpaylaga\MachshipWrapper\Contracts\CompanyItemsContract;
use Jpaylaga\MachshipWrapper\Contracts\CompanyLocationsContract;
use Jpaylaga\MachshipWrapper\Contracts\ConsignmentsContract;
use Jpaylaga\MachshipWrapper\Services\AttachmentsService;
use Jpaylaga\MachshipWrapper\Services\AuthenticateService;
use Jpaylaga\MachshipWrapper\Services\CarrierInvoicesService;
use Jpaylaga\MachshipWrapper\Services\CompaniesService;
use Jpaylaga\MachshipWrapper\Services\CompanyItemsService;
use Jpaylaga\MachshipWrapper\Services\CompanyLocationsService;
use Jpaylaga\MachshipWrapper\Services\ConsignmentsService;

class MachshipWrapperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     */
    public function boot()
    {
        // Allow publishing of config file
        $this->publishes([
            __DIR__ . '/../config/machship.php' => config_path('machship.php'),
        ], 'config');
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        // Merge package default config with app config
        $this->mergeConfigFrom(
            __DIR__ . '/../config/machship.php',
            'machship'
        );

        // Bind the MachshipService as a singleton
        $this->app->singleton('machship', function ($app) {
            return new MachshipService(
                config('machship.api_base_url'),
                config('machship.api_token')
            );
        });

        $this->app->bind(AttachmentsContract::class, function ($app, $params) {
            return new AttachmentsService($params['client']);
        });

        $this->app->bind(AuthenticateContract::class, function ($app, $params) {
            return new AuthenticateService($params['client']);
        });

        $this->app->bind(CarrierInvoicesContract::class, function ($app, $params) {
            return new CarrierInvoicesService($params['client']);
        });

        $this->app->bind(CompaniesContract::class, function ($app, $params) {
            return new CompaniesService($params['client']);
        });

        $this->app->bind(CompanyItemsContract::class, function ($app, $params) {
            return new CompanyItemsService($params['client']);
        });

        $this->app->bind(CompanyLocationsContract::class, function ($app, $params) {
            return new CompanyLocationsService($params['client']);
        });

        $this->app->bind(ConsignmentsContract::class, function ($app, $params) {
            return new ConsignmentsService($params['client']);
        });
    }
}
