<?php

namespace App\Modules\Worker\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface WorkerServiceInterface extends BaseServiceInterface
{

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);
}
