<?php

namespace App\Modules\Operation\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface OperationMeasureServiceInterface extends BaseServiceInterface
{

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);
}
