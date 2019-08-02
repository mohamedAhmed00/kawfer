<?php

namespace App\Modules\Order\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Order\Request\CartRequest;
use App\Modules\Product\Service\Interfaces\ProductServiceInterface;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * @var
     */
    protected $productService;

    /**
     * Cart constructor.
     * @param ProductServiceInterface $productService
     */
    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }


    /**
     * @param CartRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(CartRequest $request)
    {
        $product = $this->productService->getById($request->get('id'));
        Cart::add(array(
            'id' => $product->id,
            'name' =>$product->name,
            'price' => $product->final_price,
            'quantity' => $request->get('qty'),
            'attributes' => array(
                'image' => $product->image
            ))
        );
        return response()->json(['success' => 'تم اضافة المنتج بنجاح','content' => view('order.cart')->render()],200,[]);
    }
    /**
     * @param Request $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function delete(Request $request)
    {
        Cart::remove($request->get('id'));
        return response()->json(['success' => 'تم حذف المنتج بنجاح','content' => view('order.cart')->render()],200,[]);
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function empty()
    {
        Cart::clear();
        return response()->json(['success' => 'تم حذف المنتج بنجاح','content' => view('order.cart')->render()],200,[]);
    }
}
