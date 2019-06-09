<?php

namespace App\Modules\Credential\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Credential\Repository\Interfaces\CredentialInterface;
use App\Modules\Credential\Service\Interfaces\CredentialServiceInterface;
use Auth;

class CredentialServiceClass extends BaseServiceClass implements CredentialServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    public function __construct(CredentialInterface $credential)
    {
        $this->repository = $credential;
    }

    /**
     * @param array $data
     * @author Nader Ahmed
     * @return boolean
     */
    public function login(array $data)
    {
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @author Nader Ahmed
     * @return void
     */
    public function logout()
    {
        Auth::logout();
    }
}

