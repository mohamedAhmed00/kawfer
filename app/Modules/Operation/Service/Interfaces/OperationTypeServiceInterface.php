<?php

namespace App\Modules\Operation\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface OperationTypeServiceInterface extends BaseServiceInterface
{

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getWithMeasures(int $id);

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);
}
