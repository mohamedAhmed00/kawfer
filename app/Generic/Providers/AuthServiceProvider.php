<?php

namespace App\Generic\Providers;

use App\Modules\Category\Model\Category;
use App\Modules\Category\Policy\CategoryPolicy;
use App\Modules\Client\Model\Client;
use App\Modules\Client\Policy\ClientPolicy;
use App\Modules\Discount\Model\Discount;
use App\Modules\Discount\Policy\DiscountPolicy;
use App\Modules\Operation\Model\Operation;
use App\Modules\Operation\Model\OperationMeasure;
use App\Modules\Operation\Model\OperationType;
use App\Modules\Operation\Policy\OperationMeasurePolicy;
use App\Modules\Operation\Policy\OperationPolicy;
use App\Modules\Operation\Policy\OperationTypePolicy;
use App\Modules\Order\Model\Order;
use App\Modules\Order\Policy\OrderPolicy;
use App\Modules\Product\Model\Product;
use App\Modules\Product\Policy\ProductPolicy;
use App\Modules\Report\Model\Report;
use App\Modules\Report\Policy\ReportPolicy;
use App\Modules\Role\Model\Role;
use App\Modules\Role\Policy\RolePolicy;
use App\Modules\RolePermission\Model\RolePermission;
use App\Modules\RolePermission\Policy\RolePermissionPolicy;
use App\Modules\Schedule\Controller\Reservation;
use App\Modules\Schedule\Model\Schedule;
use App\Modules\Schedule\Policy\ReservationPolicy;
use App\Modules\Schedule\Policy\SchedulePolicy;
use App\Modules\Setting\Model\Setting;
use App\Modules\Setting\Policy\SettingPolicy;
use App\Modules\User\Model\User;
use App\Modules\User\Policy\UserPolicy;
use App\Modules\Worker\Model\Worker;
use App\Modules\Worker\Policy\WorkerPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Category::class => CategoryPolicy::class,
        Client::class => ClientPolicy::class,
        Operation::class => OperationPolicy::class,
        Product::class => ProductPolicy::class,
        RolePermission::class => RolePermissionPolicy::class,
        Setting::class => SettingPolicy::class,
        User::class => UserPolicy::class,
        Worker::class => WorkerPolicy::class,
        Report::class => ReportPolicy::class,
        Reservation::class => ReservationPolicy::class,
        Discount::class => DiscountPolicy::class,
        Schedule::class => SchedulePolicy::class,
        Role::class => RolePolicy::class,
        Order::class => OrderPolicy::class,
        OperationType::class => OperationTypePolicy::class,
        OperationMeasure::class => OperationMeasurePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
