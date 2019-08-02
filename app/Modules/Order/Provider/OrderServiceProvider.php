<?php

namespace App\Modules\Order\Provider;

use App\Modules\Order\Model\Order;
use App\Modules\Order\Repository\Eloquent\OrderEloquent;
use App\Modules\Order\Repository\Interfaces\OrderInterface;
use App\Modules\Order\Service\Classes\OrderServiceClass;
use App\Modules\Order\Service\Interfaces\OrderServiceInterface;
use Illuminate\Support\ServiceProvider;

class OrderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = Order::class;
        $this->app->singleton(OrderInterface::class,function () use ($model){
            return new OrderEloquent(new $model);
        });

        $this->app->singleton(OrderServiceInterface::class,OrderServiceClass::class);

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
