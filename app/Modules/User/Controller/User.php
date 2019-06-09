<?php

namespace App\Modules\User\Controller;

use App\Generic\Controller\Controller;
use App\Modules\User\Request\UserRequest;
use App\Modules\User\Request\UpdateUserRequest;
use App\Modules\User\Service\Interfaces\UserServiceInterface;

class User extends Controller
{
    /**
     * @var
     */
    protected $service;

    /**
     * User constructor.
     * @param UserServiceInterface $userService
     */
    public function __construct(UserServiceInterface $userService)
    {
        $this->service = $userService;
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index()
    {
        $users = $this->service->getAll();
        return view('user.index',compact('users'));
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function create()
    {
        return view('user.form');
    }

    /**
     * @param UserRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(UserRequest $request)
    {
        $this->service->saveUser($request);
        \request()->session()->put('successful','User was Saved Successfully');
        return redirect()->route('auth.user.index');
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id)
    {
        $user = $this->service->getById($id);
        return view('user.form',compact(['user']));
    }

    /**
     * @param int $id
     * @param UpdateUserRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(UpdateUserRequest $request , int $id)
    {
        $this->service->updateUser($request,$id);
        \request()->session()->put('successful','User was Updated Successfully');
        return redirect()->route('auth.user.index');
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function delete(int $id)
    {
        $result = $this->service->canDelete($id);
        if($result)
        {
            $this->service->delete($id);
            \request()->session()->put('successful','User was deleted Successfully');
            return redirect()->route('auth.user.index');
        }
        else
        {
            \request()->session()->put('successful','This User related with some user . please , delete this users before');
            return redirect()->route('auth.user.index');
        }
    }
}
