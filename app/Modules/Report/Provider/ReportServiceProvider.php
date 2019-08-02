<?php

namespace App\Modules\Report\Provider;

use App\Modules\Report\Service\Classes\ReportServiceClass;
use App\Modules\Report\Service\Interfaces\ReportServiceInterface;
use Illuminate\Support\ServiceProvider;

class ReportServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ReportServiceInterface::class,ReportServiceClass::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
