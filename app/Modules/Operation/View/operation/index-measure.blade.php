@extends('layout')
@section('content-admin')
    @php
        $page = "operation";
    @endphp
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">كل مقاسات النوع ( {{ $operationType->title }} )</h3>
            @can('create', \App\Modules\Operation\Model\OperationMeasure::class)

                <div class="table-data__tool float-lg-right">
                    <div class="table-data__tool-right">
                        <a href="{{ route('auth.operation.measure.create',$operationType->id) }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>اضافة مقاس جديد
                        </a>
                    </div>
                </div>
            @endcan

            <div class="table-responsive table-responsive-data2">

                <table class="table table-data2">
                    <thead>
                    <tr class="text-center">
                        <th>الترتيب</th>
                        <th>اقل سعر</th>
                        <th>اعلي سعر</th>
                        <th>تاريخ الانشاء</th>
                        @can('update', \App\Modules\Operation\Model\OperationMeasure::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @elsecan('delete', \App\Modules\Operation\Model\OperationMeasure::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($operationMeasures as $operationMeasure)
                        <tr class="tr-shadow text-center">
                            <td>{{ $operationMeasure->order }}</td>
                            <td>{{ $operationMeasure->min }}</td>
                            <td>{{ $operationMeasure->max }}</td>
                            <td><span class="status--process">{{ $operationMeasure->created_at->diffForHumans() }}</span></td>
                            @if (Auth::user()->can('update', $operationMeasure) Or Auth::user()->can('delete', $operationMeasure))
                                <td>
                                    <div class="table-data-feature text-center">
                                        @can('update', \App\Modules\Operation\Model\OperationMeasure::class)
                                            <a href="{{ route('auth.operation.measure.edit',[$operationMeasure->id,$operationType->id]) }}" class="item" data-toggle="tooltip" data-placement="top" title="تعديل">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                        @endcan
                                        @can('delete', \App\Modules\Operation\Model\OperationMeasure::class)
                                                <a href="{{ route('auth.operation.measure.delete',[$operationMeasure->id,$operationType->id]) }}" class="item delete" data-toggle="tooltip" data-placement="top" title="حذف">
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
