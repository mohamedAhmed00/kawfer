@extends('layout')
@section('content-admin')
    @php
        $page = "schedule";
        $date = request()->route('date');
        if(empty($date))
        {
            $date = request()->get('operation_date');
        }
    @endphp
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">كل العمليات عن يوم ( {{ $date }} )</h3>
            <div class="table-responsive table-responsive-data2">
                <form action=" {{ route('auth.schedule.form.index') }}" method="get">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-2">
                                <label>عرض جدول يوم معين : </label>
                            </div>
                            <div class="col-9">
                                <input type="date" placeholder="اختار اليوم" class="form-control" name="operation_date" />
                            </div>
                            <div class="col-1">
                                <button class="btn btn-primary">عرض</button>
                            </div>
                        </div>


                    </div>
                </form>

                <table class="table table-data2">
                    <thead>
                    <tr class="text-center">
                        <th># رقم العملية</th>
                        <th>اسم العميل</th>
                        <th>رقم الجوال</th>
                        <th>العامل</th>
                        <th>العملية</th>
                        <th>التكلفة</th>
                        <th>الحالة</th>
                        <th>تاريخ الحجز</th>
                        @can('update', \App\Modules\Schedule\Model\Schedule::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @elsecan('delete', \App\Modules\Schedule\Model\Schedule::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($schedules as $schedule)
                        <tr class="tr-shadow text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ !empty($schedule->Client)?$schedule->Client->name : '' }}</td>
                            <td>{{ !empty($schedule->Client)?$schedule->Client->phone_number : '' }}</td>
                            <td>{{ !empty($schedule->Worker)?$schedule->Worker->name : '' }}</td>
                            <td>{{ !empty($schedule->Operation)?$schedule->Operation->name : '' }}</td>
                            <td>{{ $schedule->total }}</td>
                            <td>{{ ($schedule->status == 'opened')? 'معلقة' : 'انتهت' }}</td>
                            <td>{{ $schedule->created_at }}</td>
                            @if ((Auth::user()->can('update', \App\Modules\Schedule\Model\Schedule::class) Or Auth::user()->can('delete', \App\Modules\Schedule\Model\Schedule::class)) AND $schedule->status == 'opened' )
                                <td>
                                    <div class="table-data-feature text-center">
                                        @if($schedule->status == 'opened')
                                            @can('update', \App\Modules\Schedule\Model\Schedule::class)
                                                <a href="{{ route('auth.schedule.edit',[$schedule->id,$date]) }}" class="item" data-toggle="tooltip" data-placement="top" title="تعديل">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                            @endcan
                                            @can('delete', \App\Modules\Schedule\Model\Schedule::class)
                                                <a href="{{ route('auth.schedule.delete',[$schedule->id,$date]) }}" class="item delete" data-toggle="tooltip" data-placement="top" title="حذف">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </a>
                                            @endcan
                                        @endif
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
