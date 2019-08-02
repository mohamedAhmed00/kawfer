<?php

namespace App\Modules\Order\Repository\Interfaces;

use App\Generic\Repository\Interfaces\BaseInterface;

interface OrderInterface extends BaseInterface
{
    /**
     * @author Nader Ahmed
     * @return mixed
     */
    public function parts();

    /**
     * @param int $product_id
     * @param int $order_id
     * @param int $quantity
     * @auther Nader Ahmed
     * @return mixed
     */
    public function attachOrder(int $product_id,int $order_id,int $quantity);

    /**
     * @param array $date
     * @author Nader Ahmed
     * @return mixed
     */
    public function getReport(array $date);

    /**
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllUser();
}
