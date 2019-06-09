<?php

namespace App\Modules\Credential\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Credential\Request\LoginRequest;
use App\Modules\Credential\Service\Interfaces\CredentialServiceInterface;

class Credential extends Controller
{
    /**
     * @var
     */
    protected $service;
    /**
     * Credential constructor.
     * @param CredentialServiceInterface $credentialService
     */
    public function __construct(CredentialServiceInterface $credentialService)
    {
        $this->service = $credentialService;
    }

    /**
     * @auther Nader Ahmed
     */
    public function getFormLogin(){
        return view('credential.login');
    }

    /**
     * @param LoginRequest $request
     * @auther Nader Ahmed
     * @return View
     */
    public function login(LoginRequest $request){
        if($this->service->login($request->all()))
        {
            return redirect()->route('auth.home');
        };
        return redirect()->back()->with('un_auth','Email and password not matched , try again');
    }

    public function home()
    {
        return view('credential.home');
    }

    /**
     * @author Nader Ahmed
     * @return void
     */
    public function logout()
    {
        $this->service->logout();
        return view('credential.login');
    }
}
