@extends('layout')
@section('content-admin')
    @php
        $page = "operation";
    @endphp
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">كل الانواع</h3>
            @can('create', \App\Modules\Operation\Model\OperationType::class)

                <div class="table-data__tool float-lg-right">
                    <div class="table-data__tool-right">
                        <a href="{{ route('auth.operation.type.create',$operation->id) }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>اضافة نوع جديد
                        </a>
                    </div>
                </div>
            @endcan

            <div class="table-responsive table-responsive-data2">

                <table class="table table-data2">
                    <thead>
                    <tr class="text-center">
                        @can('update', \App\Modules\Operation\Model\OperationType::class)
                            <th># النوع</th>
                        @endcan
                        <th>العنوان</th>
                        @can('view', \App\Modules\Operation\Model\OperationMeasure::class)
                            <th>عرض المقاسات</th>
                        @endcan
                        <th>تاريخ الانشاء</th>
                        @can('update', \App\Modules\Operation\Model\OperationType::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @elsecan('delete', \App\Modules\Operation\Model\OperationType::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($operationTypes as $operationType)
                        <tr class="tr-shadow text-center">
                            @can('update', \App\Modules\Operation\Model\OperationType::class)
                                <td><a href="{{ route('auth.operation.type.edit',[$operationType->id,$operation->id]) }}">{{ $loop->iteration }}</a></td>
                            @endcan
                            <td>{{ $operationType->title }}</td>
                            @can('view', \App\Modules\Operation\Model\OperationMeasure::class)
                                <td><a href="{{ route('auth.operation.measure.index',[$operationType->id]) }}">عرض المقاسات</a></td>
                            @endcan
                            <td><span class="status--process">{{ $operationType->created_at->diffForHumans() }}</span></td>
                            @if (Auth::user()->can('update', $operationType) Or Auth::user()->can('delete', $operationType))
                                <td>
                                    <div class="table-data-feature text-center">
                                        @can('update', \App\Modules\Operation\Model\OperationType::class)
                                            <a href="{{ route('auth.operation.type.edit',[$operationType->id,$operation->id]) }}" class="item" data-toggle="tooltip" data-placement="top" title="تعديل">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                        @endcan
                                        @can('delete', \App\Modules\Operation\Model\OperationType::class)
                                                <a href="{{ route('auth.operation.type.delete',[$operationType->id,$operation->id]) }}" class="item delete" data-toggle="tooltip" data-placement="top" title="حذف">
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
