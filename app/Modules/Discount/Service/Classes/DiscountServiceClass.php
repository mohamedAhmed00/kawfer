<?php

namespace App\Modules\Discount\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Generic\Traits\FileUpload;
use App\Modules\Discount\Repository\Interfaces\DiscountInterface;
use App\Modules\Discount\Service\Interfaces\DiscountServiceInterface;

class DiscountServiceClass extends BaseServiceClass implements DiscountServiceInterface
{
    use FileUpload;

    /**
     * @var
     */
    protected $repository;

    /**
     * DiscountServiceClass constructor.
     * @param DiscountInterface $category
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(DiscountInterface $category)
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
    public function getExpiredDiscount()
    {
        return $this->repository->getExpiredDiscount();
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
//        dd($this->repository->getById($id)->Discounts());
        return true;
    }
}

