<?php

namespace App\Modules\Product\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Product\Repository\Interfaces\ProductInterface;
use App\Modules\Product\Service\Interfaces\ProductServiceInterface;

class ProductServiceClass extends BaseServiceClass implements ProductServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * ProductServiceClass constructor.
     * @param ProductInterface $category
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(ProductInterface $category)
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
//        dd($this->repository->getById($id)->Products());
        return true;
    }
}

