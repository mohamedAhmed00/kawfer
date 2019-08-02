@extends('layout')
@section('content-admin')
    @php
        $page = "discount";
    @endphp
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">كل التخفيضات</h3>

            @can('create', \App\Modules\Discount\Model\Discount::class)
                <div class="table-data__tool float-lg-right">
                    <div class="table-data__tool-right">
                        <a href="{{ route('auth.discount.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i> اضافة تخفيض جديد
                        </a>
                    </div>
                </div>
            @endcan
            <div class="table-responsive table-responsive-data2">

                <table class="table table-data2">
                    <thead>
                    <tr class="text-center">
                        @can('update', \App\Modules\Discount\Model\Discount::class)
                            <th># التخفيض</th>
                        @endcan
                        <th>التخفيض</th>
                        @can('update', \App\Modules\Discount\Model\Discount::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @elsecan('delete', \App\Modules\Discount\Model\Discount::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($discounts as $discount)
                        <tr class="tr-shadow text-center">
                            @can('update', \App\Modules\Discount\Model\Discount::class)
                                <td><a href="{{ route('auth.discount.edit',$discount->id) }}">{{ $loop->iteration }}</a></td>
                            @endcan
                            <td>{{ $discount->percentage }} %</td>
                            @if (Auth::user()->can('update', \App\Modules\Discount\Model\Discount::class) Or Auth::user()->can('delete', \App\Modules\Discount\Model\Discount::class))
                                <td>
                                    <div class="table-data-feature text-center">
                                        @can('update', \App\Modules\Discount\Model\Discount::class)
                                            <a href="{{ route('auth.discount.edit',$discount->id) }}" class="item" data-toggle="tooltip" data-placement="top" title="تعديل">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                        @endcan
                                        @can('delete', \App\Modules\Discount\Model\Discount::class)
                                                <a href="{{ route('auth.discount.delete',$discount->id) }}" class="item delete" data-toggle="tooltip" data-placement="top" title="حذف">
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
