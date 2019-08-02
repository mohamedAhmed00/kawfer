@extends('layout')
@section('content-admin')
    @php
        $page = "order";
    @endphp
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">{{ !empty($order)? 'تعديل الطلب' . $order->name : 'انشاء طلب جديد' }}</div>
                <div class="card-body">
                    <form
                        action="{{ !empty($order)? route('auth.order.update',$order->id) : route('auth.order.store') }}"
                        method="post" novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>اختار العميل : </label>
                            <select class="selectpicker" name="client_id" data-live-search="true">
                                @foreach($clients as $client)
                                    <option data-tokens="{{ $client->id }}"
                                            value="{{ $client->id }}">{{ $client->name }}
                                        : {{ $client->phone_number }}</option>
                                @endforeach
                            </select>
                        </div>
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
                                @foreach(Cart::getContent() as $cart)
                                    <tr class="tr-shadow text-center">
                                        <td>{{ $cart->id }}</td>
                                        <td>{{ $cart->name }}</td>
                                        <td class="account-item text-center">
                                            <img src="{{ asset($cart->attributes->image) }}" alt="{{ $cart->name }}" class="image float-none"></td>
                                        <td>{{ $cart->quantity }}</td>
                                        <td>{{ $cart->price }}</td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                @endforeach
                                </tbody>
                            </table>
                            @can('select', \App\Modules\Order\Model\Order::class)
                                <a class="btn btn-md btn-primary" href="{{ route('auth.order.select.product') }}">تعديل السلة</a>
                            @endcan
                        </div>

                        <div class="text-center">
                            <button id="payment-button" type="submit" class="btn btn-md btn-info ">
                                <i class="fa fa-lock fa-lg"></i>&nbsp;
                                <span id="payment-button-amount">اتمام الطلب</span>
                                <span id="payment-button-sending" style="display:none;">الأرسال</span>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('add_to_table')

@endsection

@section('cart-script')
    <div class="noti__item js-item-menu " id="cart">
        @include('order.cart')
    </div>
@endsection
