@extends('layout')
@section('content-admin')
    @php
        $page = "order";
    @endphp
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">كل الطلبات</h3>
            <div class="table-data__tool float-lg-right">
                @can('select', \App\Modules\Order\Model\Order::class)
                    <div class="table-data__tool-right">
                        <a href="{{ route('auth.order.select.product') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>اضافة طلب
                        </a>
                    </div>
                @endcan
            </div>
            <div class="table-responsive table-responsive-data2">

                <table class="table table-data2">
                    <thead>
                    <tr class="text-center">
                        <th># الطلب</th>
                        <th>اسم العميل</th>
                        <th>التكلفه</th>
                        <th>تاريخ الانشاء</th>
                        @can('show', \App\Modules\Order\Model\Order::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @elsecan('delete', \App\Modules\Order\Model\Order::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr class="tr-shadow text-center">
                            @can('show', \App\Modules\Order\Model\Order::class)
                                <td>
                                    <a href="{{ route('auth.order.show',$order->id) }}">{{ $loop->iteration }}</a>
                                </td>
                            @endcan
                            <td>{{ $order->User->name }}</td>
                            <td>{{ $order->total }}</td>
                            <td><span class="status--process">{{ $order->created_at->diffForHumans() }}</span></td>
                            @if (Auth::user()->can('show', $order) Or Auth::user()->can('delete', $order))
                                <td>
                                    <div class="table-data-feature text-center">
                                        @can('show', \App\Modules\Order\Model\Order::class)
                                            <a href="{{ route('auth.order.show',$order->id) }}" class="item" data-toggle="tooltip" data-placement="top" title="عرض">
                                                <i class="zmdi zmdi-eye"></i>
                                            </a>
                                        @endcan

                                        @can('delete', \App\Modules\Order\Model\Order::class)
                                            <a href="{{ route('auth.order.delete',$order->id) }}" class="item delete" data-toggle="tooltip" data-placement="top" title="حذف">
                                                <i class="zmdi zmdi-delete"></i>
                                            </a>
                                        @endcan


                                    </div>
                                </td>
                            @endif
                        </tr>
                        <tr class="spacer"></tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE -->
        </div>
    </div>

@endsection

@section('delete-script')
    <script>
        $(".delete").on("click", function(){
            return confirm("هل تريد حقا حذف هذا العنصر ؟");
        });
    </script>
@endsection
