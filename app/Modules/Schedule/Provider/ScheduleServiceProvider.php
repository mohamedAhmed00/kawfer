<?php

namespace App\Modules\Schedule\Provider;

use App\Modules\Schedule\Model\Schedule;
use App\Modules\Schedule\Repository\Eloquent\ScheduleEloquent;
use App\Modules\Schedule\Repository\Interfaces\ScheduleInterface;
use App\Modules\Schedule\Service\Classes\ScheduleServiceClass;
use App\Modules\Schedule\Service\Interfaces\ScheduleServiceInterface;
use Illuminate\Support\ServiceProvider;

class ScheduleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = Schedule::class;
        $this->app->singleton(ScheduleInterface::class,function () use ($model){
            return new ScheduleEloquent(new $model);
        });

        $this->app->singleton(ScheduleServiceInterface::class,ScheduleServiceClass::class);

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
