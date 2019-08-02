<?php

namespace App\Modules\Operation\Repository\Interfaces;

use App\Generic\Repository\Interfaces\BaseInterface;

interface OperationTypeInterface extends BaseInterface
{
    /**
     * @param int $id
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getWithMeasures(int $id);
}
