<?php

namespace App\Modules\Role\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface RoleServiceInterface extends BaseServiceInterface
{

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);
}
