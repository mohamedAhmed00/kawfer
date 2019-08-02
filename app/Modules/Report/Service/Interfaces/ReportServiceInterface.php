<?php

namespace App\Modules\Report\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface ReportServiceInterface extends BaseServiceInterface
{

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);
}
