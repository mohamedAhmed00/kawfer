@extends('layout')
@section('content-admin')
    @php
        $page = "order";
        $client = $order->User;
    @endphp
    <h3 class="title-5 m-b-35">تاريخ الطلب</h3>

    <div class="row mt-5">
        <div class="table-responsive table-responsive-data2">
            <h3>تفاصيل العميل</h3>
            <table class="table table-data2 mt-3">
                <tbody>
                    <tr class="tr-shadow text-center">
                        <td>الاسم</td>
                        <td>{{ $client->name }}</td>
                        <td>اسم المستخدم</td>
                        <td>{{ $client->username }}</td>
                    </tr>
                    <tr class="spacer"></tr>
                    <tr class="tr-shadow text-center">
                        <td>البريد الالكتروني</td>
                        <td>{{ $client->email }}</td>
                        <td>رقم الهاتف</td>
                        <td>{{ $client->phone_number }}</td>
                    </tr>
                    <tr class="spacer"></tr>
                    <tr class="tr-shadow text-center">
                        <td>العمر</td>
                        <td>{{ $client->age }}</td>
                        <td>تاريخ الاضافة</td>
                        <td>{{ $client->created_at }}</td>
                    </tr>
                    <tr class="spacer"></tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-5">
        <div class="table-responsive table-responsive-data2">
            <h3>تفاصيل الطلب</h3>
            <table class="table table-data2">
                <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>المنتج</th>
                    <th>الصورة</th>
                    <th>الكمية</th>
                    <th>السعر</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orderDetails as $cart)
                    <tr class="tr-shadow text-center">
                        <td>{{ $cart->id }}</td>
                        <td>{{ $cart->name }}</td>
                        <td class="account-item text-center">
                            <img src="{{ asset($cart->image) }}" alt="{{ $cart->name }}" class="image float-none">
                        </td>
                        <td>{{ $cart->pivot->quantity }}</td>
                        <td>{{ $cart->final_price }}</td>
                    </tr>
                    <tr class="spacer"></tr>
                @endforeach
                </tbody>
            </table>
            <h4 class="h4 my-3">التكلفه النهائية : {{ $order->total }}</h4>
        </div>
    </div>
@endsection

@section('delete-script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".add_to_card").on("click", function () {
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
        function refreshCart(content) {
            $("#cart").html(content);
        }
    </script>
@endsection

@section('cart-script')
    <div class="noti__item js-item-menu " id="cart">
        @include('order.cart')
    </div>
@endsection
