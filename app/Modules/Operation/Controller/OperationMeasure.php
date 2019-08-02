<?php

namespace App\Modules\Operation\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Operation\Repository\Interfaces\OperationTypeInterface;
use App\Modules\Operation\Request\OperationMeasureRequest;
use App\Modules\Operation\Service\Interfaces\OperationMeasureServiceInterface;

class OperationMeasure extends Controller
{
    /**
     * @var
     */
    protected $service;

    /**
     * @var
     */
    protected $serviceType;

    /**
     * OperationMeasure constructor.
     * @param OperationMeasureServiceInterface $operationMeasureService
     * @param OperationTypeInterface $operationType
     */
    public function __construct(OperationMeasureServiceInterface $operationMeasureService,OperationTypeInterface $operationType)
    {
        $this->service = $operationMeasureService;
        $this->serviceType = $operationType;
    }

    /**
     * @param int $operation_type_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index(int $operation_type_id)
    {
        $operationMeasures = $this->service->getWhere(['operation_type_id' => $operation_type_id]);
        $operationType = $this->serviceType->getById($operation_type_id);
        return view('operation.index-measure',compact(['operationMeasures','operationType']));
    }

    /**
     * @param int $operation_type_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function create(int $operation_type_id)
    {
        $operationType = $this->serviceType->getById($operation_type_id);
        return view('operation.form-measure',compact('operationType'));
    }

    /**
     * @param OperationMeasureRequest $request
     * @param int $operation_type_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(OperationMeasureRequest $request,int $operation_type_id)
    {
        $this->service->storeWithOutImage(array_merge($request->all(),['operation_type_id' => $operation_type_id]));
        \request()->session()->put('successful','تم انشاء المقاس بنجاح');
        return redirect()->route('auth.operation.measure.index',$operation_type_id);
    }

    /**
     * @param int $id
     * @param int $operation_type_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id,int $operation_type_id)
    {
        $operationMeasure = $this->service->getById($id);
        $operationType = $this->serviceType->getById($operation_type_id);
        return view('operation.form-measure',compact(['operationMeasure','operationType']));
    }

    /**
     * @param int $id
     * @param int $operation_type_id
     * @param OperationMeasureRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(OperationMeasureRequest $request , int $id,int $operation_type_id)
    {
        $operationType = $this->serviceType->getById($operation_type_id);
        $this->service->updateWithoutImage($id,$request->all());
        \request()->session()->put('successful','تم تعديل المقاس بنجاح');
        return redirect()->route('auth.operation.measure.index',$operation_type_id);
    }

    /**
     * @param int $id
     * @param int $operation_type_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function delete(int $id,int $operation_type_id)
    {
        $operationType = $this->serviceType->getById($operation_type_id);
        $this->service->delete($id);
        \request()->session()->put('successful','تم حذف المقاس بنجاح ');
        return redirect()->route('auth.operation.measure.index',$operation_type_id);
    }
}
