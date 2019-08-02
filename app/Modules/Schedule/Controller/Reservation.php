<?php

namespace App\Modules\Schedule\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Client\Service\Interfaces\ClientServiceInterface;
use App\Modules\Discount\Service\Interfaces\DiscountServiceInterface;
use App\Modules\Invoice\Service\Interfaces\InvoiceServiceInterface;
use App\Modules\Operation\Service\Interfaces\OperationServiceInterface;
use App\Modules\Operation\Service\Interfaces\OperationTypeServiceInterface;
use App\Modules\Role\Service\Interfaces\RoleServiceInterface;
use App\Modules\Schedule\Request\ReservationLaterRequest;
use App\Modules\Schedule\Request\ReservationRequest;
use App\Modules\Schedule\Service\Interfaces\ScheduleServiceInterface;
use App\Modules\Worker\Service\Interfaces\WorkerServiceInterface;

class Reservation extends Controller
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
     * @var
     */
    protected $clientService;

    /**
     * @var
     */
    protected $discountService;

    /**
     * @var
     */
    protected $operationService;

    /**
     * @var
     */
    protected $operationTypeService;

    /**
     * @var
     */
    protected $roleService;

    /**
     * @var
     */
    protected $invoiceService;

    /**
     * Schedule constructor.
     * @param ScheduleServiceInterface $reservationService
     * @param ClientServiceInterface $clientService
     * @param WorkerServiceInterface $workerService
     * @param OperationServiceInterface $operationService
     * @param DiscountServiceInterface $discountService
     * @param  OperationTypeServiceInterface $operationTypeService
     */
    public function __construct(ScheduleServiceInterface $reservationService, WorkerServiceInterface $workerService,RoleServiceInterface $roleService, InvoiceServiceInterface $invoiceService,
                                ClientServiceInterface $clientService,DiscountServiceInterface $discountService, OperationServiceInterface $operationService, OperationTypeServiceInterface $operationTypeService)
    {
        $this->service = $reservationService;
        $this->workerService = $workerService;
        $this->clientService = $clientService;
        $this->discountService = $discountService;
        $this->operationService = $operationService;
        $this->roleService = $roleService;
        $this->operationTypeService =  $operationTypeService;
        $this->invoiceService = $invoiceService;
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function indexForToday()
    {
        $role = $this->roleService->getWhere(['slug' => 'client'])->first();
        $workers = $this->workerService->getAll();
        $clients = $this->clientService->getWhere(['role_id' => $role->id]);
        $discounts = $this->discountService->getAll();
        $operations = $this->operationService->getAll();
        return view('schedule.reservation-today',compact(['clients','workers','discounts','operations']));
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function getOperationDataById(int $id)
    {
        $operationTypes = $this->operationTypeService->getWithMeasures($id);
        $html = view("schedule.choice_container", compact("operationTypes"))->render();
        return response()->json(['data' => $html] ,200 , []);
    }

    /**
     * @param ReservationRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function storeForToday(ReservationRequest $request)
    {
        $reservation = $this->service->storeWithOutImage(array_merge($request->all(),['operation_date' => date('Y-m-d')]));
        $this->invoiceService->printInvoc($reservation);
        \request()->session()->put('successful','تم انشاء الحجز بنجاح ');
        return redirect()->route('auth.reservation.today.index');
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function indexForLater()
    {
        $role = $this->roleService->getWhere(['slug' => 'client'])->first();
        $workers = $this->workerService->getAll();
        $clients = $this->clientService->getWhere(['role_id' => $role->id]);
        $discounts = $this->discountService->getAll();
        $operations = $this->operationService->getAll();
        return view('schedule.reservation-later',compact(['clients','workers','discounts','operations']));
    }

    /**
     * @param ReservationLaterRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function storeForLater(ReservationLaterRequest $request)
    {
        $data = $request->all();
        $data['operation_date'] = date('Y-m-d',strtotime($data['operation_date']));
        $reservation = $this->service->storeWithOutImage($request->all());
        $this->invoiceService->printInvoc($reservation);

        \request()->session()->put('successful','تم انشاء الحجز بنجاح ');
        return redirect()->route('auth.reservation.later.index');
    }
}
