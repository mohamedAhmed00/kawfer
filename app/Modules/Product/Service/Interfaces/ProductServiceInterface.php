<?php

namespace App\Modules\Product\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface ProductServiceInterface extends BaseServiceInterface
{

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);

    /**
     * @param $OrderProducts
     * @author Nader Ahmed
     * @return Mixed
     */
    public function updateOrder($OrderProducts);

    /**
     * @author Nader Ahmed
     * @return mixed
     */
    public function getExpiredProduct();

    /** @author Nader Ahmed
     * @return mixed
     */
    public function getAllWithExpireField();


}
