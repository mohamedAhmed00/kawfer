<?php

namespace App\Modules\Worker\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface WorkerServiceInterface extends BaseServiceInterface
{

    /**
     * @param array $array
     * @param string $path
     * @author Nader Ahmed
     * @return mixed
     */
    public function storeImages(array $array, string $path);

    /**
     * @param int $id
     * @param array $array
     * @param string $path
     * @author Nader Ahmed
     * @return mixed
     */
    public function updateImages(int $id , array $array, string $path);

    /**
     * @author Nader Ahmed
     * @return mixed
     */
    public function getExpiredWorker();

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);

    /**
     * @author Nader Ahmed
     * @return mixed
     */
    public function getAllWithExpireField();

    /**
     * @param string $date
     * @author Nader Ahmed
     * @return mixed
     */
    public function getReport(string $date);
}
