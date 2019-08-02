<?php

namespace App\Modules\Worker\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Generic\Traits\FileUpload;
use App\Modules\Worker\Repository\Interfaces\WorkerInterface;
use App\Modules\Worker\Service\Interfaces\WorkerServiceInterface;

class WorkerServiceClass extends BaseServiceClass implements WorkerServiceInterface
{
    use FileUpload;

    /**
     * @var
     */
    protected $repository;

    /**
     * WorkerServiceClass constructor.
     * @param WorkerInterface $category
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(WorkerInterface $category)
    {
        $this->repository = $category;
        parent::__construct($this->repository);
    }

    /**
     * @param array $array
     * @param string $path
     * @author Nader Ahmed
     * @return mixed
     */
    public function storeImages(array $array, string $path)
    {
        $array['passport_image'] = $this->imageUpload($array['passport_image'] , $path);
        $array['health_certificate_id'] = $this->imageUpload($array['health_certificate_id'] , $path);
        $array['national_id'] = $this->imageUpload($array['national_id'] , $path);
        return $this->repository->storeImages($array);
    }

    /**
     * @param int $id
     * @param array $array
     * @param string $path
     * @author Nader Ahmed
     * @return mixed
     */
    public function updateImages(int $id , array $array, string $path)
    {
        if(!empty($array['passport_image']) AND is_file($array['passport_image']))
        {
            $array['passport_image'] = $this->imageUpload($array['passport_image'] , $path);
        }
        if(!empty($array['health_certificate_id']) AND is_file($array['health_certificate_id']))
        {
            $array['health_certificate_id'] = $this->imageUpload($array['health_certificate_id'] , $path);
        }
        if(!empty($array['national_id']) AND is_file($array['national_id']))
        {
            $array['national_id'] = $this->imageUpload($array['national_id'] , $path);
        }
        return $this->repository->updateImages($array,$id);
    }

    /**
     * @author Nader Ahmed
     * @return mixed
     */
    public function getExpiredWorker()
    {
        return $this->repository->getExpiredWorker();
    }

    /**
     * @author Nader Ahmed
     * @return mixed
     */
    public function getAllWithExpireField()
    {
        return $this->repository->getAllWithExpireField();
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id)
    {
//        dd($this->repository->getById($id)->Workers());
        return true;
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
}

