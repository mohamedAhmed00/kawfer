<?php

namespace App\Modules\Product\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Category\Service\Interfaces\CategoryServiceInterface;
use App\Modules\Product\Request\ProductRequest;
use App\Modules\Product\Service\Interfaces\ProductServiceInterface;
use Illuminate\Http\Request;

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
        $products = $this->service->getAllWithExpireField();
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
        \request()->session()->put('successful','تم اضافة المنتج بنجاح');
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
        \request()->session()->put('successful','تم تعديل المنتج بنجاح');
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
            \request()->session()->put('successful','تم حذف المنتج بنجاح');
            return redirect()->route('auth.product.index');
        }
        else
        {
            \request()->session()->put('successful','هذا المنتج مرتبط مع نتائج و طلبات . قم بحذفهم قبل حذف هذا المنتج');
            return redirect()->route('auth.product.index');
        }
    }

    /**
     * @param Request $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function getProductByQrcode(Request $request)
    {
        $products = $this->service->getWhere(['qr_code' => $request->get('qr_code')]);
        return response()->json(['products'=> $products],200 ,[]);
    }
}
