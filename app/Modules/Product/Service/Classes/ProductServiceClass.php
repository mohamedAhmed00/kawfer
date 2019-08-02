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

    /**
     * @param $OrderProducts
     * @author Nader Ahmed
     * @return Mixed
     */
    public function updateOrder($orderProducts){

        foreach($orderProducts as $product)
        {
            $this->repository->update($product->id,['quantity' => $product->pivot->quantity + $product->quantity ]);
        }
        return 0;
    }

    /**
     * @author Nader Ahmed
     * @return mixed
     */
    public function getExpiredProduct()
    {
        return $this->repository->getExpiredProduct();
    }

    /**
     * @author Nader Ahmed
     * @return mixed
     */
    public function getAllWithExpireField()
    {
        return $this->repository->getAllWithExpireField();
    }
}

