<?php

namespace App\Modules\Operation\Provider;

use App\Modules\Operation\Model\OperationMeasure;
use App\Modules\Operation\Repository\Eloquent\OperationMeasureEloquent;
use App\Modules\Operation\Repository\Interfaces\OperationMeasureInterface;
use App\Modules\Operation\Service\Classes\OperationMeasureServiceClass;
use App\Modules\Operation\Service\Interfaces\OperationMeasureServiceInterface;
use Illuminate\Support\ServiceProvider;

class OperationMeasureServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = OperationMeasure::class;
        $this->app->singleton(OperationMeasureInterface::class,function () use ($model){
            return new OperationMeasureEloquent(new $model);
        });

        $this->app->singleton(OperationMeasureServiceInterface::class,OperationMeasureServiceClass::class);

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
