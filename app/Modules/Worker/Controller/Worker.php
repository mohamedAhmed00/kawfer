<?php

namespace App\Modules\Worker\Controller;

use App\Generic\Controller\Controller;
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
        $workers = $this->service->getAll();
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
        $request->has('image')? $this->service->storeWithImage($request->all(),'worker') : $this->service->storeWithOutImage($request->all());
        \request()->session()->put('successful','Worker was Saved Successfully');
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
     * @param WorkerRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(WorkerRequest $request , int $id)
    {
        $request->has('image')? $this->service->updateWithImage($id,$request->all(),'worker') : $this->service->updateWithoutImage($id,$request->all());
        \request()->session()->put('successful','Worker was Updated Successfully');
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
            \request()->session()->put('successful','Worker was deleted Successfully');
            return redirect()->route('auth.worker.index');
        }
        else
        {
            \request()->session()->put('successful','This Worker related with some worker . please , delete this workers before');
            return redirect()->route('auth.worker.index');
        }
    }
}
