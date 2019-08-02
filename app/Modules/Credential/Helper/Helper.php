<?php

if (!function_exists('get_role')) {
    /**
     * @author Nader Ahmed
     * @return mixed
     */
    function get_role()
    {
        return auth()->user()->Roles;
    }
}

if (!function_exists('get_operation_count')) {
    /**
     * @author Nader Ahmed
     * @return int
     */
    function get_operation_count()
    {
         return app(\App\Modules\Operation\Service\Interfaces\OperationServiceInterface::class)->getCount([]);
    }
}

if (!function_exists('get_product_count')) {
    /**
     * @author Nader Ahmed
     * @return int
     */
    function get_product_count()
    {
        return app(\App\Modules\Product\Service\Interfaces\ProductServiceInterface::class)->getCount([]);
    }
}

if (!function_exists('get_order')) {
    /**
     * @author Nader Ahmed
     * @return int
     */
    function get_order()
    {
        return app(\App\Modules\Order\Service\Interfaces\OrderServiceInterface::class)->getAll();
    }
}

if (!function_exists('get_client')) {
    /**
     * @author Nader Ahmed
     * @return int
     */
    function get_client()
    {
        return app(\App\Modules\Client\Service\Interfaces\ClientServiceInterface::class)->getAll();
    }
}
