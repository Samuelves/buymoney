<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Http\Interfaces\ICoins',
            'App\Application\Quotation\AvailableCoins'
        );
        $this->app->bind(
            'App\Http\Interfaces\IQuotation',
            'App\Application\Quotation\Quotation'
        );
        // Repositories
        $this->app->bind(
            'App\Application\Interfaces\ICoins',
            'App\Infra\ExternalData\CoinsRepository'
        );
        $this->app->bind(
            'App\Application\Interfaces\IQuotation',
            'App\Infra\ExternalData\QuotationRepository'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
