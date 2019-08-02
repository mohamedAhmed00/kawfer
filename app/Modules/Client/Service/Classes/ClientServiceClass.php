<?php

namespace App\Modules\Client\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Client\Repository\Interfaces\ClientInterface;
use App\Modules\Client\Service\Interfaces\ClientServiceInterface;

class ClientServiceClass extends BaseServiceClass implements ClientServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * ClientServiceClass constructor.
     * @param ClientInterface $category
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(ClientInterface $category)
    {
        $this->repository = $category;
        parent::__construct($this->repository);
    }

    /**
     * @param $request
     * @author Nader Ahmed
     * @return void
     */
    public function saveClient($request)
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
    public function updateClient($request,int $id)
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
//        dd($this->repository->getById($id)->Clients());
        return true;
    }
}

