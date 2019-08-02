<?php

namespace App\Modules\Schedule\Repository\Interfaces;

use App\Generic\Repository\Interfaces\BaseInterface;

interface ScheduleInterface extends BaseInterface
{

    /**
     * @param string $date
     * @author Nader Ahmed
     * @return mixed
     */
    public function getWithRelatedData(string $date);
}
