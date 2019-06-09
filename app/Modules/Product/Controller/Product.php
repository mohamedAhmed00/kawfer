<?php

namespace App\Modules\Product\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Category\Service\Interfaces\CategoryServiceInterface;
use App\Modules\Product\Request\ProductRequest;
use App\Modules\Product\Service\Interfaces\ProductServiceInterface;

class Product extends Controller
{
    /**
     * @var
     */
    protected $service;

    /**
     * @var
     */
    protected $categoryService;

    /**
     * Product constructor.
     * @param ProductServiceInterface $productService
     * @param CategoryServiceInterface $categoryService
     */
    public function __construct(ProductServiceInterface $productService,CategoryServiceInterface $categoryService)
    {
        $this->service = $productService;
        $this->categoryService = $categoryService;
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index()
    {
        $products = $this->service->getAll();
        return view('product.index',compact('products'));
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function create()
    {
        $categories = $this->categoryService->getAll();
        return view('product.form',compact('categories'));
    }

    /**
     * @param ProductRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(ProductRequest $request)
    {
        $request->has('image')? $this->service->storeWithImage($request->all(),'product') : $this->service->storeWithOutImage($request->all());
        \request()->session()->put('successful','Product was Saved Successfully');
        return redirect()->route('auth.product.index');
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id)
    {
        $product = $this->service->getById($id);
        $categories = $this->categoryService->getAll();
        return view('product.form',compact(['product','categories']));
    }

    /**
     * @param int $id
     * @param ProductRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(ProductRequest $request , int $id)
    {
        $request->has('image')? $this->service->updateWithImage($id,$request->all(),'product') : $this->service->updateWithoutImage($id,$request->all());
        \request()->session()->put('successful','Product was Updated Successfully');
        return redirect()->route('auth.product.index');
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
            \request()->session()->put('successful','Product was deleted Successfully');
            return redirect()->route('auth.product.index');
        }
        else
        {
            \request()->session()->put('successful','This Product related with some product . please , delete this products before');
            return redirect()->route('auth.product.index');
        }
    }
}
