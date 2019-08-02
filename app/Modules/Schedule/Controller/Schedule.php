<?php

namespace App\Modules\Schedule\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Schedule\Request\UpdateReservationRequest;
use App\Modules\Schedule\Service\Interfaces\ScheduleServiceInterface;
use App\Modules\Worker\Service\Interfaces\WorkerServiceInterface;
use Illuminate\Http\Request;

class Schedule extends Controller
{
    /**
     * @var
     */
    protected $service;

    /**
     * @var
     */
    protected $workerService;

    /**
     * Schedule constructor.
     * @param ScheduleServiceInterface $scheduleService
     * @param WorkerServiceInterface $workerService
     */
    public function __construct(ScheduleServiceInterface $scheduleService,WorkerServiceInterface $workerService)
    {
        $this->service = $scheduleService;
        $this->workerService = $workerService;
    }

    /**
     * @param string $date
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index(string $date = null)
    {
        $schedules = !empty($date)? $this->service->getWithRelatedData($date) : $this->service->getWithRelatedData(date('Y-m-d')) ;
        return view('schedule.index',compact('schedules'));
    }

    /**
     * @param Request $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function indexGetForm(Request $request)
    {
        $schedules = !empty($request->get('operation_date'))? $this->service->getWithRelatedData($request->get('operation_date')) : $this->service->getWithRelatedData(date('Y-m-d')) ;
        return view('schedule.index',compact('schedules'));
    }

    /**
     * @param int $id
     * @param string $date
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id,string $date)
    {
        $schedule = $this->service->getById($id);
        if($schedule->status == 'opened')
        {
            $workers = $this->workerService->getAll();
            return view('schedule.edit',compact(['schedule','date','workers']));
        }

    }

    /**
     * @param int $id
     * @param UpdateReservationRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(UpdateReservationRequest $request , int $id)
    {
        $this->service->updateWithoutImage($id,$request->all());
        \request()->session()->put('successful','تم الحجز بنجاح');
        return redirect()->route('auth.schedule.index',$request->get('date'));
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function delete(int $id,$date)
    {
        $this->service->delete($id);
        \request()->session()->put('successful','تم حذف العملية بنجاح');
        return redirect()->route('auth.schedule.index',$date);
    }
}
