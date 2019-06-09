<?php

namespace App\Modules\Worker\Provider;

use App\Modules\Worker\Model\Worker;
use App\Modules\Worker\Repository\Eloquent\WorkerEloquent;
use App\Modules\Worker\Repository\Interfaces\WorkerInterface;
use App\Modules\Worker\Service\Classes\WorkerServiceClass;
use App\Modules\Worker\Service\Interfaces\WorkerServiceInterface;
use Illuminate\Support\ServiceProvider;

class WorkerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = Worker::class;
        $this->app->singleton(WorkerInterface::class,function () use ($model){
            return new WorkerEloquent(new $model);
        });

        $this->app->singleton(WorkerServiceInterface::class,WorkerServiceClass::class);

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
