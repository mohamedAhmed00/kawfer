<?php

namespace App\Modules\Product\Repository\Interfaces;

use App\Generic\Repository\Interfaces\BaseInterface;

interface ProductInterface extends BaseInterface
{
    /**
     * @author Nader Ahmed
     * @return mixed
     */
    public function getExpiredProduct();

    /**
     * @author Nader Ahmed
     * @return mixed
     */
    public function getAllWithExpireField();
}
