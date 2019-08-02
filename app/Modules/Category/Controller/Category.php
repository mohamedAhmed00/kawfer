<?php

namespace App\Modules\Category\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Category\Request\CategoryRequest;
use App\Modules\Category\Service\Interfaces\CategoryServiceInterface;

class Category extends Controller
{
    /**
     * @var
     */
    protected $service;

    /**
     * Category constructor.
     * @param CategoryServiceInterface $categoryService
     */
    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->service = $categoryService;
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index()
    {
        $categories = $this->service->getAll();
        return view('category.index',compact('categories'));
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function create()
    {
        return view('category.form');
    }

    /**
     * @param CategoryRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(CategoryRequest $request)
    {
        $request->has('image')? $this->service->storeWithImage($request->all(),'category') : $this->service->storeWithOutImage($request->all());
        \request()->session()->put('successful','تم اضافة القسم بنجاح');
        return redirect()->route('auth.category.index');
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id)
    {
        $category = $this->service->getById($id);
        return view('category.form',compact('category'));
    }

    /**
     * @param int $id
     * @param CategoryRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(CategoryRequest $request , int $id)
    {
        $request->has('image')? $this->service->updateWithImage($id,$request->all(),'category') : $this->service->updateWithoutImage($id,$request->all());
        \request()->session()->put('successful','تم تعديل القسم بنجاح ');
        return redirect()->route('auth.category.index');
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
            \request()->session()->put('successful','هذا القسم مرتبط مع منتجات . احذف المنتجات اولا ثم احذف القسم');
        }
        else
        {
            $this->service->delete($id);
            \request()->session()->put('successful','تم حذف القسم بنجاح');
        }
        return redirect()->route('auth.category.index');
    }
}
