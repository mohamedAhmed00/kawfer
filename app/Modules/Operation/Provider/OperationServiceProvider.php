<?php

namespace App\Modules\Operation\Provider;

use App\Modules\Operation\Model\Operation;
use App\Modules\Operation\Repository\Eloquent\OperationEloquent;
use App\Modules\Operation\Repository\Interfaces\OperationInterface;
use App\Modules\Operation\Service\Classes\OperationServiceClass;
use App\Modules\Operation\Service\Interfaces\OperationServiceInterface;
use Illuminate\Support\ServiceProvider;

class OperationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = Operation::class;
        $this->app->singleton(OperationInterface::class,function () use ($model){
            return new OperationEloquent(new $model);
        });

        $this->app->singleton(OperationServiceInterface::class,OperationServiceClass::class);

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
