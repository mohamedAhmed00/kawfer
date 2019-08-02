<?php

namespace App\Modules\Order\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Order\Repository\Interfaces\OrderInterface;
use App\Modules\Order\Service\Interfaces\OrderServiceInterface;
use Cart;
class OrderServiceClass extends BaseServiceClass implements OrderServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * OrderServiceClass constructor.
     * @param OrderInterface $category
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(OrderInterface $category)
    {
        $this->repository = $category;
        parent::__construct($this->repository);
    }

    /**
     * @author Nader Ahmed
     * @return mixed
     */
    public function parts()
    {
        return $this->repository->parts();
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id)
    {
//        dd($this->repository->getById($id)->Orders());
        return true;
    }

    /**
     * @param int $client_id
     * @param $service
     * @author Nader Ahmed
     * @return mixed
     */
    public function finishOrder(int $client_id,$service)
    {
        $order = $this->repository->store(['user_id'=>$client_id,'total' => Cart::getTotal()]);
        foreach(Cart::getContent() as $cart)
        {
            $this->repository->attachOrder($cart->id,$order->id,$cart->quantity);
            $product = $service->getById($cart->id);
            $service->updateWithoutImage($cart->id,['quantity' => $product->quantity - $cart->quantity]);
        }
        Cart::clear();
        return $order;
    }

    /**
     * @param string $date
     * @author Nader Ahmed
     * @return mixed
     */
    public function getReport(string $date)
    {
        $date = explode(' - ',$date);
        return $this->repository->getReport($date);
    }

    /**
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllUser()
    {
       return $this->repository->getAllUser();
    }
}
