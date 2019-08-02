<?php

namespace App\Modules\Report\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Report\Repository\Interfaces\ReportInterface;
use App\Modules\Report\Service\Interfaces\ReportServiceInterface;

class ReportServiceClass extends BaseServiceClass implements ReportServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * ReportServiceClass constructor.
     * @param ReportInterface $category
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(ReportInterface $category)
    {
        $this->repository = $category;
        parent::__construct($this->repository);
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id)
    {
//        dd($this->repository->getById($id)->Reports());
        return true;
    }
}

