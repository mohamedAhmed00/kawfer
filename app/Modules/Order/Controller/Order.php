<?php

namespace App\Modules\Order\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Client\Service\Interfaces\ClientServiceInterface;
use App\Modules\Invoice\Service\Interfaces\InvoiceServiceInterface;
use App\Modules\Order\Request\OrderRequest;
use App\Modules\Order\Service\Interfaces\OrderServiceInterface;
use App\Modules\Product\Service\Interfaces\ProductServiceInterface;
use App\Modules\Role\Service\Interfaces\RoleServiceInterface;
use Cart;

class Order extends Controller
{
    /**
     * @var
     */
    protected $service;

    /**
     * @var
     */
    protected $clientService;

    /**
     * @var
     */
    protected $productService;

    /**
     * @var
     */
    protected $roleService;

    /**
     * @var
     */
    protected $invoiceService;

    /**
     * Order constructor.
     * @param OrderServiceInterface $orderService
     * @param ClientServiceInterface $clientService
     * @param RoleServiceInterface $roleService
     * @param ProductServiceInterface $productService
     * @param InvoiceServiceInterface $invoiceService
     */
    public function __construct(OrderServiceInterface $orderService,ClientServiceInterface $clientService,RoleServiceInterface $roleService,ProductServiceInterface $productService,InvoiceServiceInterface $invoiceService)
    {
        $this->service = $orderService;
        $this->clientService = $clientService;
        $this->roleService = $roleService;
        $this->productService = $productService;
        $this->invoiceService = $invoiceService;
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index()
    {
        $orders = $this->service->getAllUser();

        return view('order.index',compact(['orders','clients']));
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function selectProduct()
    {
        $products = $this->productService->getAll();

        return view('order.select_order',compact(['products']));
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function create()
    {
        if(Cart::isEmpty())
        {
            \request()->session()->put('successful','لابد من اضافة منتجات الي السلة قبل انهاء الطلب');
            return redirect(route('auth.order.select.product'));
        }
        $role = $this->roleService->getWhere(['slug' => 'client'])->first();
        $clients = $this->clientService->getWhere(['role_id' => $role->id]);
        $products = $this->productService->getAll();
        return view('order.form',compact(['clients','products']));
    }

    /**
     * @param OrderRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(OrderRequest $request)
    {
        $dataToPrint = Cart::getContent();
        $order = $this->service->finishOrder($request->client_id,$this->productService);
        $this->invoiceService->printInvocToOrder($dataToPrint,$request->all(),$order);
        \request()->session()->put('successful','تم انشاء الطلب بنجاح');
        return redirect()->route('auth.order.index');
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function show(int $id)
    {
        $order = $this->service->getById($id);
        $orderDetails = $order->OrderProducts;
        return view('order.show',compact(['order','orderDetails']));
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function delete(int $id)
    {
        $order = $this->service->getById($id);
        $this->productService->updateOrder($order->OrderProducts);
        $this->service->delete($id);
        \request()->session()->put('successful','تم حذف الطلب بنجاح');
        return redirect()->route('auth.order.index');
    }
}
