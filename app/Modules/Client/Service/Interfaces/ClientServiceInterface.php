<?php

namespace App\Modules\Client\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface ClientServiceInterface extends BaseServiceInterface
{

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);

    /**
     * @param  $request
     * @author Nader Ahmed
     * @return void
     */
    public function saveClient( $request);

    /**
     * @param  $request
     * @param  int $id
     * @author Nader Ahmed
     * @return void
     */
    public function updateClient( $request,int $id);
}
