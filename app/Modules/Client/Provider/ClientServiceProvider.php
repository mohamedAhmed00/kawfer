<?php

namespace App\Modules\Client\Provider;

use App\Modules\Client\Repository\Eloquent\ClientEloquent;
use App\Modules\Client\Repository\Interfaces\ClientInterface;
use App\Modules\Client\Service\Classes\ClientServiceClass;
use App\Modules\Client\Service\Interfaces\ClientServiceInterface;
use App\Modules\Client\Model\Profile;
use App\Modules\Client\Repository\Eloquent\ProfileEloquent;
use App\Modules\Client\Repository\Interfaces\ProfileInterface;
use App\Modules\Client\Service\Classes\ProfileServiceClass;
use App\Modules\Client\Service\Interfaces\ProfileServiceInterface;
use App\Modules\User\Model\User;
use Illuminate\Support\ServiceProvider;

class ClientServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $model = User::class;
        $this->app->singleton(ClientInterface::class,function () use ($model){
            return new ClientEloquent(new $model);
        });
        $this->app->singleton(ClientServiceInterface::class,ClientServiceClass::class);

        $model = Profile::class;
        $this->app->singleton(ProfileInterface::class,function () use ($model){
            return new ProfileEloquent(new $model);
        });
        $this->app->singleton(ProfileServiceInterface::class,ProfileServiceClass::class);
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
