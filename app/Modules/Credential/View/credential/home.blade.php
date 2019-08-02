@extends('layout')
@section('content-admin')
    @php
        $page = "dashboard";
        $clients = get_client();
        $operationCount = get_operation_count();
        $productCount = get_product_count();
        $orders = get_order();
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">نظرة عامة</h2>
            </div>
        </div>
    </div>
    <div class="row m-t-25">
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c1">
                <div class="overview__inner">
                    <div class="overview-box clearfix my-5">
                        <div class="icon">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>
                        <div class="text pb-5 mb-5">
                            <h2>{{ count($clients) }}</h2>
                            <span>العملاء</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c2">
                <div class="overview__inner">
                    <div class="overview-box clearfix my-5">
                        <div class="icon">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>
                        <div class="text pb-5 mb-5">
                            <h2>{{ $productCount }}</h2>
                            <span>عدد المنتجات</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c3">
                <div class="overview__inner">
                    <div class="overview-box clearfix my-5">
                        <div class="icon">
                            <i class="zmdi zmdi-calendar-note"></i>
                        </div>
                        <div class="text pb-5 mb-5">
                            <h2>{{ $operationCount }}</h2>
                            <span>العمليات</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c4">
                <div class="overview__inner">
                    <div class="overview-box clearfix my-5">
                        <div class="icon">
                            <i class="zmdi zmdi-cloud-box"></i>
                        </div>
                        <div class="text pb-5 mb-5">
                            <h2>{{ count($orders) }}</h2>
                            <span>الطلبات</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-9">
            <h2 class="title-1 m-b-25">الطلبات</h2>
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                    <tr>
                        <th>التاريخ</th>
                        <th>رقم الطلب</th>
                        <th>اسم العميل</th>
                        <th class="text-right">السعر</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders->take(10) as $order)
                        <tr>
                            <td>2018-09-29 05:57</td>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->User->name }}</td>
                            <td class="text-right">{{ $order->total }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-3">
            <h2 class="title-1 m-b-25">احدث عملاء</h2>
            <div class="au-card au-card--bg-blue au-card-top-countries m-b-40">
                <div class="au-card-inner">
                    <div class="table-responsive">
                        <table class="table table-top-countries">
                            <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    <td>{{ $client->name }}</td>
                                    <td class="text-right">{{ $client->created_at->diffforhumans() }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

