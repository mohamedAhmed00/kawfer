<?php

namespace App\Modules\Discount\Provider;

use App\Modules\Discount\Model\Discount;
use App\Modules\Discount\Repository\Eloquent\DiscountEloquent;
use App\Modules\Discount\Repository\Interfaces\DiscountInterface;
use App\Modules\Discount\Service\Classes\DiscountServiceClass;
use App\Modules\Discount\Service\Interfaces\DiscountServiceInterface;
use Illuminate\Support\ServiceProvider;

class DiscountServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = Discount::class;
        $this->app->singleton(DiscountInterface::class,function () use ($model){
            return new DiscountEloquent(new $model);
        });

        $this->app->singleton(DiscountServiceInterface::class,DiscountServiceClass::class);

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
