@extends('layout')
@section('content-admin')
    @php
        $page = "worker";
    @endphp
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">كل العمال</h3>

            @can('create', \App\Modules\Worker\Model\Worker::class)
                <div class="table-data__tool float-lg-right">
                    <div class="table-data__tool-right">
                        <a href="{{ route('auth.worker.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i> اضافة عامل جديد
                        </a>
                    </div>
                </div>
            @endcan
            <div class="table-responsive table-responsive-data2">

                <table class="table table-data2">
                    <thead>
                    <tr class="text-center">
                        @can('update', \App\Modules\Worker\Model\Worker::class)
                            <th># العامل</th>
                        @endcan
                        <th>الاسم</th>
                        <th>رقم الهاتف</th>
                        <th>السن</th>
                        <th>الحالة</th>
                        @can('update', \App\Modules\Worker\Model\Worker::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @elsecan('delete', \App\Modules\Worker\Model\Worker::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($workers as $worker)
                        <tr class="tr-shadow text-center">
                            @can('update', \App\Modules\Worker\Model\Worker::class)
                                <td><a href="{{ route('auth.worker.edit',$worker->id) }}">{{ $loop->iteration }}</a></td>
                            @endcan
                            <td>{{ $worker->name }}</td>
                            <td>{{ $worker->phone_number }}</td>
                            <td><span class="status--process">{{ $worker->age }}</span></td>
                            <td><span class="{{ $worker->expire == 0? 'status--process' : 'status--denied' }}">{{ $worker->expire == 0? 'متوفر' : 'علي وشك نفاذ الكمية' }}</span></td>
                            @if (Auth::user()->can('update', \App\Modules\Worker\Model\Worker::class) Or Auth::user()->can('delete', \App\Modules\Worker\Model\Worker::class))
                                <td>
                                    <div class="table-data-feature text-center">
                                        @can('update', \App\Modules\Worker\Model\Worker::class)
                                            <a href="{{ route('auth.worker.edit',$worker->id) }}" class="item" data-toggle="tooltip" data-placement="top" title="تعديل">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                        @endcan
                                        @can('delete', \App\Modules\Worker\Model\Worker::class)
                                                <a href="{{ route('auth.worker.delete',$worker->id) }}" class="item delete" data-toggle="tooltip" data-placement="top" title="حذف">
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
