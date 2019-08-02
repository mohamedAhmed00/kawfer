@extends('layout')
@section('content-admin')
    @php
        $page = "order";
        $cart = Cart::getContent();
    @endphp
    <h3 class="title-5 m-b-35">اضاف منتجات الي السلة</h3>
    <div class="table-data__tool float-lg-right mb-5">
        @can('create', \App\Modules\Order\Model\Order::class)
            <div class="table-data__tool-right">
                <a href="{{ route('auth.order.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>أتمام الطلب
                </a>
            </div>
        @endcan
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <div class="row form-group cart_collection">
                <div class="col-7">
                    <input type="text" data-content="" id="qr_code" placeholder="كود المنتج"
                           class="form-control">
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row" id="all_products">

            </div>
        </div>
{{--        @foreach($products as $product)--}}
{{--            <div class="col-md-4">--}}
{{--                <div class="card">--}}
{{--                    <img class="card-img-top" src="{{ $product->image }}" alt="{{ $product->name }}">--}}
{{--                    <div class="card-body">--}}
{{--                        <h4 class="card-title mb-3">{{ $product->name }}</h4>--}}
{{--                        <p class="card-text">--}}
{{--                        <h5 style="line-height: 28px"> السعر : {{ $product->final_price }} ريال--}}
{{--                            <br>--}}
{{--                            الكمية المتاحة :--}}
{{--                            {{ $product->quantity }}--}}
{{--                        </h5>--}}
{{--                        <div class="row form-group cart_collection">--}}
{{--                            <div class="col-7">--}}
{{--                                <input type="text" data-content="{{ $product->id }}" placeholder="الكمية المتاحة"--}}
{{--                                       class="form-control">--}}
{{--                            </div>--}}
{{--                            <div class="col-5">--}}
{{--                                @can('addCart', \App\Modules\Order\Model\Order::class)--}}
{{--                                    <button type="submit" data-content="{{ $product->quantity }}"--}}
{{--                                            class="btn btn-primary btn-sm add_to_card">اضاف الي السلة--}}
{{--                                    </button>--}}
{{--                                @endcan--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}
    </div>
@endsection

@section('delete-script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("body").on("click",".add_to_card", function () {
            let element = $(this).parents('.cart_collection').find('input');
            let productQty = Number($(this).attr('data-content'));
            let qty = Number(element.val());
            let id = element.attr('data-content');
            if (isNaN(qty)) {
                $.notify("الكمية لابد ان تكون ارقام", "error");
            } else if (qty > productQty) {
                $.notify("الكمية المطلوبه اكبر من الكمية المتاحة", "error");
            } else {

                $.ajax({
                    type: 'POST',
                    url: '{{ route('auth.cart.store') }}',
                    data: {
                        'qty': qty,
                        'id': id,
                    },
                    success: function (res) {
                        $.notify(res.success, "success");
                        refreshCart(res.content);
                    }
                });
            }
        });
        $("#cart").on("click", '.empty_cart' , function () {
            $.ajax({
                type: 'get',
                url: '{{ route('auth.cart.empty') }}',
                data: {},
                success: function (res) {
                    $.notify(res.success, "success");
                    refreshCart(res.content);
                }
            });
        });
        $(".empty_cart").on("click" , function () {
            $.ajax({
                type: 'get',
                url: '{{ route('auth.cart.empty') }}',
                data: {},
                success: function (res) {
                    $.notify(res.success, "success");
                    refreshCart(res.content);
                }
            });
        });

        $("#cart").on("click", '.remove_item' , function () {
            let id = Number($(this).attr('data-content'));
            $.ajax({
                type: 'post',
                url: '{{ route('auth.cart.delete') }}',
                data: {
                    'id': id,
                },
                success: function (res) {
                    $.notify(res.success, "success");
                    refreshCart(res.content);
                }
            });
        });
        $(".remove_item").on("click" , function () {
            let id = Number($(this).attr('data-content'));
            $.ajax({
                type: 'post',
                url: '{{ route('auth.cart.delete') }}',
                data: {
                    'id': id,
                },
                success: function (res) {
                    $.notify(res.success, "success");
                    refreshCart(res.content);
                }
            });
        });
        $("#qr_code").on("keyup",function(){
            setTimeout(function() {
                let value =  $("#qr_code").val();
                if(value)
                {
                    $.ajax({
                        type: 'post',
                        url: '{{ route('auth.product.get') }}',
                        data: {
                            'qr_code': value,
                        },
                        success: function (res) {
                            $("#qr_code").val('');
                            let products = res.products;
                            $("#all_products").html(htmlGeneration(products));
                        }
                    });
                }
            } , 1000);
        });
        function refreshCart(content) {
            $("#cart").html(content);
        };
        function htmlGeneration(json) {
            let html = "";
            json.forEach(function(item){
                html = '            <div class="col-md-4">\n' +
                    '                <div class="card">\n' +
                    '                    <img class="card-img-top" src="' + item.image + '" alt="' + item.name + '">\n' +
                    '                    <div class="card-body">\n' +
                    '                        <h4 class="card-title mb-3">' + item.name + '</h4>\n' +
                    '                        <p class="card-text">\n' +
                    '                        <h5 style="line-height: 28px"> السعر : ' + item.final_price + '  ريال' +
                    '                            <br>\n' +
                    '                            الكمية المتاحة :\n' +
                    '                             ' + item.quantity + ' \n' +
                    '                        </h5>\n' +
                    '                        <div class="row form-group cart_collection">\n' +
                    '                            <div class="col-7">\n' +
                    '                                <input type="text" data-content="' + item.id + '" placeholder="الكمية "\n' +
                    '                                       class="form-control">\n' +
                    '                            </div>\n' +
                    '                            <div class="col-5">\n' +
                    '                                @can('addCart', App\Modules\Order\Model\Order::class)' +
                    '                                    <button type="submit" data-content="' + item.quantity + '"\n' +
                    '                                            class="btn btn-primary btn-sm add_to_card">اضاف الي السلة\n' +
                    '                                    </button>\n' +
                    '                                @endcan' +
                    '                            </div>\n' +
                    '                        </div>\n' +
                    '                        </p>\n' +
                    '                    </div>\n' +
                    '                </div>\n' +
                    '            </div>';
            })
            return html;
        }
    </script>
@endsection

@section('cart-script')
    <div class="noti__item js-item-menu " id="cart">
        @include('order.cart')
    </div>
@endsection
