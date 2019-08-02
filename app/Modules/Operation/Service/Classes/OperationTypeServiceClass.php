<?php

namespace App\Modules\Operation\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Operation\Repository\Interfaces\OperationTypeInterface;
use App\Modules\Operation\Service\Interfaces\OperationTypeServiceInterface;

class OperationTypeServiceClass extends BaseServiceClass implements OperationTypeServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * OperationServiceClass constructor.
     * @param OperationTypeInterface $category
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(OperationTypeInterface $category)
    {
        $this->repository = $category;
        parent::__construct($this->repository);
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getWithMeasures(int $id)
    {
        return $this->repository->getWithMeasures($id);
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

