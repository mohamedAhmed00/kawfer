<?php

namespace App\Modules\Worker\Repository\Interfaces;

use App\Generic\Repository\Interfaces\BaseInterface;

interface WorkerInterface extends BaseInterface
{
    /**
     * @param array $array
     * @author Nader Ahmed
     * @return mixed
     */
    public function storeImages(array $array);

    /**
     * @param array $array
     * @param int $id
     * @author Nader Ahmed
     * @return mixed
     */
    public function updateImages($array,$id);

    /**
     * @author Nader Ahmed
     * @return mixed
     */
    public function getExpiredWorker();

    /**
     * @author Nader Ahmed
     * @return mixed
     */
    public function getAllWithExpireField();

    /**
     * @param array $date
     * @author Nader Ahmed
     * @return mixed
     */
    public function getReport(array $date);
}
