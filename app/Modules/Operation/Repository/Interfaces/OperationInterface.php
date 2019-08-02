<?php

namespace App\Modules\Operation\Repository\Interfaces;

use App\Generic\Repository\Interfaces\BaseInterface;

interface OperationInterface extends BaseInterface
{
    /**
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getWithTypes();

    /**
     * @param array $date
     * @author Nader Ahmed
     * @return mixed
     */
    public function getReport(array $date);
}
