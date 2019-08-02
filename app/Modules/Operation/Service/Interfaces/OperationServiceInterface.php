<?php

namespace App\Modules\Operation\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface OperationServiceInterface extends BaseServiceInterface
{

    /**
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getWithTypes();

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);

    /**
     * @param string $date
     * @author Nader Ahmed
     * @return mixed
     */
    public function getReport(string $date);
}
