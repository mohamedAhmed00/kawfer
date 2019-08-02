<?php

namespace App\Modules\Discount\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Discount\Request\UpdateDiscountRequest;
use App\Modules\Discount\Request\DiscountRequest;
use App\Modules\Discount\Service\Interfaces\DiscountServiceInterface;

class Discount extends Controller
{
    /**
     * @var
     */
    protected $service;


    /**
     * Discount constructor.
     * @param DiscountServiceInterface $discountService
     */
    public function __construct(DiscountServiceInterface $discountService)
    {
        $this->service = $discountService;
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index()
    {
        $discounts = $this->service->getAll();
        return view('discount.index',compact('discounts'));
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function create()
    {
        return view('discount.form');
    }

    /**
     * @param DiscountRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(DiscountRequest $request)
    {
        $this->service->storeWithOutImage($request->all());
        \request()->session()->put('successful','تم اضافة التخفيض بنجاح');
        return redirect()->route('auth.discount.index');
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id)
    {
        $discount = $this->service->getById($id);
        return view('discount.form',compact(['discount']));
    }

    /**
     * @param int $id
     * @param UpdateDiscountRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(UpdateDiscountRequest $request , int $id)
    {
        $this->service->updateWithoutImage($id,$request->all());
        \request()->session()->put('successful','تم تعديل التخفيض بنجاح');
        return redirect()->route('auth.discount.index');
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function delete(int $id)
    {
        $this->service->delete($id);
        \request()->session()->put('successful','تم حذف التخفيض بنجاح');
        return redirect()->route('auth.discount.index');
    }
}
