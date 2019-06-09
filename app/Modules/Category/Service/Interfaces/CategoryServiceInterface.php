<?php

namespace App\Modules\Category\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface CategoryServiceInterface extends BaseServiceInterface
{

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);
}
