<?php

namespace App\Modules\Worker\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Worker\Request\UpdateWorkerRequest;
use App\Modules\Worker\Request\WorkerRequest;
use App\Modules\Worker\Service\Interfaces\WorkerServiceInterface;

class Worker extends Controller
{
    /**
     * @var
     */
    protected $service;


    /**
     * Worker constructor.
     * @param WorkerServiceInterface $workerService
     */
    public function __construct(WorkerServiceInterface $workerService)
    {
        $this->service = $workerService;
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index()
    {
        $workers = $this->service->getAllWithExpireField();
        return view('worker.index',compact('workers'));
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function create()
    {
        return view('worker.form');
    }

    /**
     * @param WorkerRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(WorkerRequest $request)
    {
        $this->service->storeImages($request->all(),'worker');
        \request()->session()->put('successful','تم اضافة العامل بنجاح');
        return redirect()->route('auth.worker.index');
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id)
    {
        $worker = $this->service->getById($id);
        return view('worker.form',compact(['worker']));
    }

    /**
     * @param int $id
     * @param UpdateWorkerRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(UpdateWorkerRequest $request , int $id)
    {
        $this->service->updateImages($id,$request->all(),'worker');
        \request()->session()->put('successful','تم تعديل العامل بنجاح');
        return redirect()->route('auth.worker.index');
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
            \request()->session()->put('successful','تم حذف العامل بنجاح');
            return redirect()->route('auth.worker.index');
        }
        else
        {
            \request()->session()->put('successful','هذا العامل مرتبط بنتائج و عمليات و عملاء . احذفهم قبل حذف هذا العامل');
            return redirect()->route('auth.worker.index');
        }
    }
}
