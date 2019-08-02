<?php

namespace App\Modules\Schedule\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;
use App\Modules\Schedule\Model\Schedule;

interface ScheduleServiceInterface extends BaseServiceInterface
{

    /**
     * @param string $date
     * @author Nader Ahmed
     * @return mixed
     */
    public function getWithRelatedData(string $date);


    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);

}
