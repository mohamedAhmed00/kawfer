<?php

namespace App\Modules\Client\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Client\Request\ProfileRequest;
use App\Modules\Client\Request\UpdateProfileRequest;
use App\Modules\Client\Service\Interfaces\ProfileServiceInterface;
use App\Modules\Role\Service\Interfaces\RoleServiceInterface;
use App\Modules\Client\Request\ClientRequest;
use App\Modules\Client\Request\UpdateClientRequest;
use App\Modules\Client\Service\Interfaces\ClientServiceInterface;

class Client extends Controller
{
    /**
     * @var
     */
    protected $service;

    /**
     * @var
     */
    protected $roleService;

    /**
     * @var
     */
    protected $profileService;

    /**
     * Client constructor.
     * @param ClientServiceInterface $clientService
     * @param RoleServiceInterface $roleService
     * @param ProfileServiceInterface $profileService
     */
    public function __construct(ClientServiceInterface $clientService,RoleServiceInterface $roleService,ProfileServiceInterface $profileService)
    {
        $this->service = $clientService;
        $this->roleService = $roleService;
        $this->profileService = $profileService;
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index()
    {
        $role = $this->roleService->getWhere(['slug' => 'client'])->first();
        $clients = $this->service->getWhere(['role_id' => $role->id]);
        return view('client.index',compact('clients'));
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function create()
    {
        return view('client.form' );
    }

    /**
     * @param ClientRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(ClientRequest $request)
    {
        $role = $this->roleService->getWhere(['slug' => 'client'])->first();
        $request->request->add(['role_id' => $role->id]);
        $this->service->saveClient($request);
        \request()->session()->put('successful','تم اضافة العميل بنجاح');
        return redirect()->route('auth.client.index');
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id)
    {
        $client = $this->service->getById($id);
        return view('client.form',compact(['client','roles']));
    }

    /**
     * @param int $id
     * @param UpdateClientRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(UpdateClientRequest $request , int $id)
    {
        $this->service->updateClient($request,$id);
        \request()->session()->put('successful','تم تعديل العميل بنجاح');
        return redirect()->route('auth.client.index');
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
            \request()->session()->put('successful','تم حذف العميل بنجاح');
            return redirect()->route('auth.client.index');
        }
        else
        {
            \request()->session()->put('successful','هذا العميل مرتبط بنتائج و عمليات و طلبات اخرا . قم بحذفهم قبل حذف العميل');
            return redirect()->route('auth.client.index');
        }
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function profile(int $id)
    {
        $client = $this->service->getById($id);
        $profile = $this->profileService->getwhere(['user_id' => $id])->first();
        return view('client.profile',compact(['client','profile']));
    }

    /**
     * @param ProfileRequest $request
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function createProfile(ProfileRequest $request,$id)
    {
        $data = $request->all();
        $data['hair_type'] = $data['from'] . ' | ' . $data['to'];
        $data['user_id'] = $id;
        if(!empty($data['other_hair_last_operation']))
        {
            $data['hair_last_operation'] = '';
        }
        else
        {
            $data['hair_last_operation'] = $data['hair_last_operation'] ;
        }
        dd($data);
        $this->profileService->storeWithOutImage($data);
        \request()->session()->put('successful','تم انشاء ملف العميل بنجاح');
        return redirect()->route('auth.client.profile.edit',$id);
    }

    /**
     * @param UpdateProfileRequest $request
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function updateProfile(UpdateProfileRequest $request,$id,$profile_id)
    {
        $data = $request->all();
        $data['hair_type'] = $data['from'] . ' | ' . $data['to'];
        if(!empty($data['other_hair_last_operation']))
        {
            $data['hair_last_operation'] = '';
        }
        else
        {
            $data['hair_last_operation'] = $data['hair_last_operation'] ;
        }
        $data['hair_color'] = !empty($data['other_color'])? '' : $data['hair_color'];

        $this->profileService->updateWithoutImage($profile_id,$data);
        \request()->session()->put('successful','تم تعديل ملف العميل بنجاح');
        return redirect()->route('auth.client.profile.edit',$id);
    }
}
