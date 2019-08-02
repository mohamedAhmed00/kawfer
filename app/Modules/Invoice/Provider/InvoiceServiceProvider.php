<?php

namespace App\Modules\Invoice\Provider;

use App\Modules\Invoice\Model\Invoice;
use App\Modules\Invoice\Repository\Eloquent\InvoiceEloquent;
use App\Modules\Invoice\Repository\Interfaces\InvoiceInterface;
use App\Modules\Invoice\Service\Classes\InvoiceServiceClass;
use App\Modules\Invoice\Service\Interfaces\InvoiceServiceInterface;
use Illuminate\Support\ServiceProvider;

class InvoiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = Invoice::class;
        $this->app->singleton(InvoiceInterface::class,function () use ($model){
            return new InvoiceEloquent(new $model);
        });

        $this->app->singleton(InvoiceServiceInterface::class,InvoiceServiceClass::class);

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
