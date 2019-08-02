<?php

namespace App\Modules\Operation\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Operation\Request\OperationTypeRequest;
use App\Modules\Operation\Service\Interfaces\OperationServiceInterface;
use App\Modules\Operation\Service\Interfaces\OperationTypeServiceInterface;

class OperationType extends Controller
{
    /**
     * @var
     */
    protected $service;

    /**
     * @var
     */
    protected $operationService;

    /**
     * OperationType constructor.
     * @param OperationTypeServiceInterface $operationTypeService
     * @param OperationServiceInterface $operationService
     */
    public function __construct(OperationTypeServiceInterface $operationTypeService,OperationServiceInterface $operationService)
    {
        $this->service = $operationTypeService;
        $this->operationService = $operationService;
    }

    /**
     * @param int $operation_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index(int $operation_id)
    {
        $operationTypes = $this->service->getWhere(['operation_id'=>$operation_id]);
        $operation = $this->operationService->getById($operation_id);
        return view('operation.index-type',compact(['operationTypes','operation']));
    }

    /**
     * @param int $operation_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function create(int $operation_id)
    {
        $operation = $this->operationService->getById($operation_id);
        return view('operation.form-type',compact('operation'));
    }

    /**
     * @param int $operation_id
     * @param OperationTypeRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(OperationTypeRequest $request,int $operation_id)
    {
        $operation = $this->operationService->getById($operation_id);
        $this->service->storeWithOutImage(array_merge($request->all(),['operation_id' => $operation_id]));

        \request()->session()->put('successful','تم انشاء العملية بنجاح');
        return redirect()->route('auth.operation.type.index',$operation_id);
    }

    /**
     * @param int $id
     * @param int $operation_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id,int $operation_id)
    {
        $operation = $this->operationService->getById($operation_id);
        $operationType = $this->service->getById($id);
        return view('operation.form-type',compact(['operationType','operation']));
    }

    /**
     * @param int $id
     * @param int $operation_id
     * @param OperationTypeRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(OperationTypeRequest $request , int $id,int $operation_id)
    {
        $operation = $this->operationService->getById($operation_id);
        $request->has('image')? $this->service->updateWithImage($id,$request->all(),'operationType') : $this->service->updateWithoutImage($id,$request->all());
        \request()->session()->put('successful','تم تعديل العملية بنجاح');
        return redirect()->route('auth.operation.type.index',$operation_id);
    }

    /**
     * @param int $id
     * @param int $operation_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function delete(int $id,int $operation_id)
    {
        $operation = $this->operationService->getById($operation_id);
        $result = $this->service->canDelete($id);
        if($result)
        {
            $this->service->delete($id);
            \request()->session()->put('successful','تم حذف العملية بنجاح ');
            return redirect()->route('auth.operation.type.index',compact('operation_id'));
        }
        else
        {
            \request()->session()->put('successful','هذه العملية مرتبطه مع نتائج و عملاء لابد من حذقهم قبل حذف  العملية ');
            return redirect()->route('auth.operation.type.index',compact('operation_id'));
        }
    }
}
