<?php

namespace App\Modules\Operation\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Operation\Request\OperationRequest;
use App\Modules\Operation\Service\Interfaces\OperationServiceInterface;

class Operation extends Controller
{
    /**
     * @var
     */
    protected $service;


    /**
     * Operation constructor.
     * @param OperationServiceInterface $operationService
     */
    public function __construct(OperationServiceInterface $operationService)
    {
        $this->service = $operationService;
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index()
    {
        $operations = $this->service->getAll();
        return view('operation.index',compact('operations'));
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function create()
    {
        return view('operation.form');
    }

    /**
     * @param OperationRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(OperationRequest $request)
    {
        $request->has('image')? $this->service->storeWithImage($request->all(),'operation') : $this->service->storeWithOutImage($request->all());
        \request()->session()->put('successful','تم انشاء العملية بنجاح');
        return redirect()->route('auth.operation.index');
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id)
    {
        $operation = $this->service->getById($id);
        return view('operation.form',compact(['operation']));
    }

    /**
     * @param int $id
     * @param OperationRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(OperationRequest $request , int $id)
    {
        $request->has('image')? $this->service->updateWithImage($id,$request->all(),'operation') : $this->service->updateWithoutImage($id,$request->all());
        \request()->session()->put('successful','تم تعديل العملية بنجاح');
        return redirect()->route('auth.operation.index');
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
            \request()->session()->put('successful','تم حذف العملية بنجاح ');
            return redirect()->route('auth.operation.index');
        }
        else
        {
            \request()->session()->put('successful','هذه العملية مرتبطه مع نتائج و عملاء لابد من حذقهم قبل حذف  العملية ');
            return redirect()->route('auth.operation.index');
        }
    }
}
