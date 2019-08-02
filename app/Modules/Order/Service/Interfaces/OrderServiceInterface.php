<?php

namespace App\Modules\Order\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface OrderServiceInterface extends BaseServiceInterface
{
    /**
     * @author Nader Ahmed
     * @return mixed
     */
    public function parts();
    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);

    /**
     * @param int $client_id
     * @param $service
     * @author Nader Ahmed
     * @return mixed
     */
    public function finishOrder(int $client_id,$service);

    /**
     * @param string $date
     * @author Nader Ahmed
     * @return mixed
     */
    public function getReport(string $date);

    /**
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllUser();
}
