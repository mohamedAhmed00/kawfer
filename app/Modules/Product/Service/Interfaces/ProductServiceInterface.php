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
}
