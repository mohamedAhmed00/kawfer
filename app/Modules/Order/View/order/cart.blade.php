@php
    $cart = Cart::getContent();
@endphp
<i class="zmdi zmdi-shopping-cart"></i>
<span class="quantity">{{ $cart->count() }}</span>
<div class="mess-dropdown js-dropdown">
    <div class="mess__title">
        <p class="text-dark">مكونات سله التسوق</p>
    </div>
    @foreach($cart as $item)
        <div class="mess__item">
            <div class="image img-cir img-40">
                <img src="{{ asset($item->attributes->image) }}" alt="{{ $item->name }}">
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-sm-9">
                        <h6>اسم المنتج : {{ $item->name }}</h6>
                    </div>
                    <div class="col-sm-3">
                        @can('deleteCart', \App\Modules\Order\Model\Order::class)
                            <button class="btn btn-danger remove_item" data-content="{{ $item->id }}"><i
                                    class="zmdi zmdi-delete text-white"></i></button>
                        @endcan
                    </div>
                    <div class="col-sm-6">
                        <h6>السعر :{{ $item->price }}</h6>
                    </div>
                    <div class="col-sm-6">
                        <h6>الكمية {{ $item->quantity }}</h6>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

    <div class="mess__footer pt-4 pb-4">
        <div class="col-sm-9">
            <h6>السعر الكلي : {{ Cart::getTotal() }}</h6>
        </div>
        @can('emptyCart', \App\Modules\Order\Model\Order::class)
            <div class="col-sm-2 mt-3">
                <button class="btn btn-danger empty_cart">تفريغ السلة</button>
            </div>
        @endcan
    </div>

</div>
