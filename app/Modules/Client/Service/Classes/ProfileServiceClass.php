<?php

namespace App\Modules\Client\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Client\Repository\Interfaces\ProfileInterface;
use App\Modules\Client\Service\Interfaces\ProfileServiceInterface;

class ProfileServiceClass extends BaseServiceClass implements ProfileServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * ProfileServiceClass constructor.
     * @param ProfileInterface $category
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(ProfileInterface $category)
    {
        $this->repository = $category;
        parent::__construct($this->repository);
    }

    /**
     * @param $request
     * @author Nader Ahmed
     * @return void
     */
    public function saveProfile($request)
    {
        $data = $request->all();
        if($request->has('password'))
        {
            $data['password'] = bcrypt($data['password']);
        }
        !empty($data['image'])? $this->storeWithImage($data,'client') : $this->storeWithOutImage($data);

    }

    /**
     * @param $request
     * @author Nader Ahmed
     * @return void
     */
    public function updateProfile($request,int $id)
    {
        $data = $request->all();
        if($request->has('password'))
        {
            $data['password'] = bcrypt($data['password']);
        }
        !empty($data['image'])? $this->updateWithImage($id,$data,'client') : $this->updateWithoutImage($id,$data);
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id)
    {
//        dd($this->repository->getById($id)->Profiles());
        return true;
    }
}

