<?php

namespace App\Modules\Worker\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Worker\Repository\Interfaces\WorkerInterface;
use App\Modules\Worker\Service\Interfaces\WorkerServiceInterface;

class WorkerServiceClass extends BaseServiceClass implements WorkerServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * WorkerServiceClass constructor.
     * @param WorkerInterface $category
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(WorkerInterface $category)
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
//        dd($this->repository->getById($id)->Workers());
        return true;
    }
}

