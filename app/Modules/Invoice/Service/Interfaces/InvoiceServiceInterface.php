<?php

namespace App\Modules\Invoice\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;
use App\Modules\Invoice\Model\Invoice;

interface InvoiceServiceInterface extends BaseServiceInterface
{

    /**
     * @param $reservation
     * @author Nader Ahmed
     * @return mixed
     */
    public function printInvoc($reservation);

    /**
     * @param $cart
     * @param $client_id
     * @param $order
     * @author Nader Ahmed
     * @return mixed
     */
    public function printInvocToOrder($cart , $client_id,$order);

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);

}
