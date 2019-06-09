<?php

namespace App\Modules\Operation\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Operation\Repository\Interfaces\OperationInterface;
use App\Modules\Operation\Service\Interfaces\OperationServiceInterface;

class OperationServiceClass extends BaseServiceClass implements OperationServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * OperationServiceClass constructor.
     * @param OperationInterface $category
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(OperationInterface $category)
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
//        dd($this->repository->getById($id)->Operations());
        return true;
    }
}

