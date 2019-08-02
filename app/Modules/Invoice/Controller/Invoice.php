<?php

namespace App\Modules\Invoice\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Invoice\Request\UpdateReservationRequest;
use App\Modules\Invoice\Service\Interfaces\InvoiceServiceInterface;
use App\Modules\Worker\Service\Interfaces\WorkerServiceInterface;
use Illuminate\Http\Request;

class Invoice extends Controller
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
     * Invoice constructor.
     * @param InvoiceServiceInterface $invoiceService
     * @param WorkerServiceInterface $workerService
     */
    public function __construct(InvoiceServiceInterface $invoiceService,WorkerServiceInterface $workerService)
    {
        $this->service = $invoiceService;
        $this->workerService = $workerService;
    }

    /**
     * @param string $date
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index(string $date = null)
    {
        $invoices = !empty($date)? $this->service->getWithRelatedData($date) : $this->service->getWithRelatedData(date('Y-m-d')) ;
        return view('invoice.index',compact('invoices'));
    }

    /**
     * @param Request $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function indexGetForm(Request $request)
    {
        $invoices = !empty($request->get('operation_date'))? $this->service->getWithRelatedData($request->get('operation_date')) : $this->service->getWithRelatedData(date('Y-m-d')) ;
        return view('invoice.index',compact('invoices'));
    }

    /**
     * @param int $id
     * @param string $date
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id,string $date)
    {
        $invoice = $this->service->getById($id);
        if($invoice->status == 'opened')
        {
            $workers = $this->workerService->getAll();
            return view('invoice.edit',compact(['invoice','date','workers']));
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
        return redirect()->route('auth.invoice.index',$request->get('date'));
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
        return redirect()->route('auth.invoice.index',$date);
    }
}
