@extends('layout')
@section('content-admin')
    @php
        $page = "operation";
    @endphp
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">كل العمليات</h3>
            @can('create', \App\Modules\Operation\Model\Operation::class)

                <div class="table-data__tool float-lg-right">
                    <div class="table-data__tool-right">
                        <a href="{{ route('auth.operation.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>اضافة عملية
                        </a>
                    </div>
                </div>
            @endcan

            <div class="table-responsive table-responsive-data2">

                <table class="table table-data2">
                    <thead>
                    <tr class="text-center">
                        @can('update', \App\Modules\Operation\Model\Operation::class)
                            <th># العملية</th>
                        @endcan
                        <th>الاسم</th>
                        <th>السعر</th>
                        @can('view', \App\Modules\Operation\Model\OperationType::class)
                            <th>انواع الشعر</th>
                        @endcan
                        <th>تاريخ الانشاء</th>
                        @can('update', \App\Modules\Operation\Model\Operation::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @elsecan('delete', \App\Modules\Operation\Model\Operation::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($operations as $operation)
                        <tr class="tr-shadow text-center">
                            @can('update', \App\Modules\Operation\Model\Operation::class)
                                <td><a href="{{ route('auth.operation.edit',$operation->id) }}">{{ $loop->iteration }}</a></td>
                            @endcan
                            <td>{{ $operation->name }}</td>
                            <td><span class="status--process">{{ $operation->price }}</span></td>
                            @can('view', \App\Modules\Operation\Model\OperationType::class)
                                <td><a href="{{ route('auth.operation.type.index',$operation->id) }}">عرض انواع الشعر</a></td>
                            @endcan
                            <td><span class="status--process">{{ $operation->created_at->diffForHumans() }}</span></td>
                            @if (Auth::user()->can('update', $operation) Or Auth::user()->can('delete', $operation))
                                <td>
                                    <div class="table-data-feature text-center">
                                        @can('update', \App\Modules\Operation\Model\Operation::class)
                                            <a href="{{ route('auth.operation.edit',$operation->id) }}" class="item" data-toggle="tooltip" data-placement="top" title="تعديل">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                        @endcan
                                        @can('delete', \App\Modules\Operation\Model\Operation::class)
                                            <a href="{{ route('auth.operation.delete',$operation->id) }}" class="item delete" data-toggle="tooltip" data-placement="top" title="حذف">
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
