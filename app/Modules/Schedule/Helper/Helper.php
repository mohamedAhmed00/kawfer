<?php
if (!function_exists('get_expired_worker')) {
    /**
     * @author Nader Ahmed
     * @return mixed
     */
    function get_expired_worker()
    {
        return app(\App\Modules\Worker\Service\Interfaces\WorkerServiceInterface::class)->getExpiredWorker();
    }
}
