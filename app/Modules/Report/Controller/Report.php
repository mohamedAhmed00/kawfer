<?php

namespace App\Modules\Report\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Operation\Service\Interfaces\OperationServiceInterface;
use App\Modules\Order\Service\Interfaces\OrderServiceInterface;
use App\Modules\Worker\Service\Interfaces\WorkerServiceInterface;
use Illuminate\Http\Request;

class Report extends Controller
{

    /**
     * @var
     */
    protected $orderService;

    /**
     * @var
     */
    protected $operationService;

    /**
     * @var
     */
    protected $workerService;

    /**
     * @param OrderServiceInterface $orderService
     * @param OperationServiceInterface $operationService
     * @param WorkerServiceInterface $workerService
     * Report constructor.
     */
    public function __construct(OrderServiceInterface $orderService,OperationServiceInterface $operationService,WorkerServiceInterface $workerService)
    {
        $this->orderService = $orderService;
        $this->operationService = $operationService;
        $this->workerService = $workerService;
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function selectDate()
    {
        return view('report.select_date');
    }

    /**
     * @param Request $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function getSelectDate(Request $request)
    {
        $date = $request->get('date');
        $reports = array('operation' => $this->operationService->getReport($date),'order' => $this->orderService->getReport($date),'workers' => $this->workerService->getReport($date));
        return view('report.daily-index',compact(['date','reports']));
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function dailyIndex()
    {
        return view('report.daily-index');
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function monthlyIndex()
    {
        return view('report.monthly-index');
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function annuallyIndex()
    {
        return view('report.annually-index');
    }

}
