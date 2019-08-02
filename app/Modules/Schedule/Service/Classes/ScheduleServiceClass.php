<?php

namespace App\Modules\Schedule\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Generic\Traits\FileUpload;
use App\Modules\Schedule\Model\Schedule;
use App\Modules\Schedule\Repository\Interfaces\ScheduleInterface;
use App\Modules\Schedule\Service\Interfaces\ScheduleServiceInterface;

class ScheduleServiceClass extends BaseServiceClass implements ScheduleServiceInterface
{
    use FileUpload;

    /**
     * @var
     */
    protected $repository;

    /**
     * ScheduleServiceClass constructor.
     * @param ScheduleInterface $category
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(ScheduleInterface $category)
    {
        $this->repository = $category;
        parent::__construct($this->repository);
    }

    /**
     * @param string $date
     * @author Nader Ahmed
     * @return mixed
     */
    public function getWithRelatedData(string $date)
    {
        return $this->repository->getWithRelatedData($date);
    }


    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id)
    {
//        dd($this->repository->getById($id)->Schedules());
        return true;
    }
}

