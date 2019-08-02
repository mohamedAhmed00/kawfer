<?php
if (!function_exists('get_expired_product')) {
    /**
     * @author Nader Ahmed
     * @return mixed
     */
    function get_expired_product()
    {
        return app(\App\Modules\Product\Service\Interfaces\ProductServiceInterface::class)->getExpiredProduct();
    }
}
