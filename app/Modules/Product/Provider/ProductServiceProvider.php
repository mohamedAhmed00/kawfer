<?php

namespace App\Modules\Product\Provider;

use App\Modules\Product\Model\Product;
use App\Modules\Product\Repository\Eloquent\ProductEloquent;
use App\Modules\Product\Repository\Interfaces\ProductInterface;
use App\Modules\Product\Service\Classes\ProductServiceClass;
use App\Modules\Product\Service\Interfaces\ProductServiceInterface;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = Product::class;
        $this->app->singleton(ProductInterface::class,function () use ($model){
            return new ProductEloquent(new $model);
        });

        $this->app->singleton(ProductServiceInterface::class,ProductServiceClass::class);

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
