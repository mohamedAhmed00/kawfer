<?php

namespace App\Modules\Operation\Provider;

use App\Modules\Operation\Model\OperationType;
use App\Modules\Operation\Repository\Eloquent\OperationTypeEloquent;
use App\Modules\Operation\Repository\Interfaces\OperationTypeInterface;
use App\Modules\Operation\Service\Classes\OperationTypeServiceClass;
use App\Modules\Operation\Service\Interfaces\OperationTypeServiceInterface;
use Illuminate\Support\ServiceProvider;

class OperationTypeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = OperationType::class;
        $this->app->singleton(OperationTypeInterface::class,function () use ($model){
            return new OperationTypeEloquent(new $model);
        });

        $this->app->singleton(OperationTypeServiceInterface::class,OperationTypeServiceClass::class);

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
