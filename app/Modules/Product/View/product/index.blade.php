@extends('layout')
@section('content-admin')
    @php
        $page = "product";
    @endphp
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">كل المنتجات</h3>

            @can('create', \App\Modules\Product\Model\Product::class)
                <div class="table-data__tool float-lg-right">
                    <div class="table-data__tool-right">
                        <a href="{{ route('auth.product.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i> اضافة عنصر
                        </a>
                    </div>
                </div>
            @endcan
            <div class="table-responsive table-responsive-data2">

                <table class="table table-data2">
                    <thead>
                    <tr class="text-center">
                        @can('update', \App\Modules\Product\Model\Product::class)
                            <th># المنتج</th>
                        @endcan
                        <th>الاسم</th>
                        <th>الصورة</th>
                        <th>الكمية</th>
                        <th>السعر الاصلي</th>
                        <th>سعر البيع</th>
                        <th>الحالة</th>
                        @can('update', \App\Modules\Product\Model\Product::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @elsecan('delete', \App\Modules\Product\Model\Product::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr class="tr-shadow text-center">
                            @can('update', \App\Modules\Product\Model\Product::class)
                                <td><a href="{{ route('auth.product.edit',$product->id) }}">{{ $loop->iteration }}</a></td>
                            @endcan
                            <td>{{ $product->name }}</td>
                            <td class="account-item text-center"><img src="{{ asset($product->image )}}"
                                                                      class="image float-none" alt=""></td>
                            <td><span class="status--process">{{ $product->quantity }}</span></td>
                            <td><span class="status--process">{{ $product->actual_price }}</span></td>
                            <td><span class="status--process">{{ $product->final_price }}</span></td>
                            <td><span class="{{ $product->expire == 0? 'status--process' : 'status--denied' }}">{{ $product->expire == 0? 'متوفر' : 'علي وشك نفاذ الكمية' }}</span></td>

                            @if (Auth::user()->can('update', \App\Modules\Product\Model\Product::class) Or Auth::user()->can('delete', \App\Modules\Product\Model\Product::class))
                                <td>
                                    <div class="table-data-feature text-center">
                                        @can('update', \App\Modules\Product\Model\Product::class)
                                            <a href="{{ route('auth.product.edit',$product->id) }}" class="item"
                                               data-toggle="tooltip" data-placement="top" title="تعديل">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                        @endcan
                                        @can('delete', \App\Modules\Product\Model\Product::class)
                                            <a href="{{ route('auth.product.delete',$product->id) }}"
                                               class="item delete" data-toggle="tooltip" data-placement="top"
                                               title="حذف">
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
        $(".delete").on("click", function () {
            return confirm("هل تريد حقا حذف هذا العنصر ؟");
        });
    </script>
@endsection
