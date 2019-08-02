@extends('layout')
@section('content-admin')
    @php
        $page = "report";
    @endphp
    <div class="row">
        <div class="col-12">
            <h2 class="text-dark">التقرير عن الفترة : {{ $date }} </h2>
        </div>
        <br><br>
        <div class="col-lg-12">
            <h2 class="title-1 m-b-25">الاحصائيات ( مختصر )</h2>
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>السعر الاصلي</th>
                        <th>السعر النهائي</th>
                        <th>صافي الربح</th>
                        <th>العدد</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>الطلبات</td>
                        <td>{{ $reports['order'][0]->actaul_price }}</td>
                        <td>{{ $reports['order'][0]->total }}</td>
                        <td>{{ $reports['order'][0]->total - $reports['order'][0]->actaul_price }}</td>
                        <td>{{ $reports['order'][0]->count }}</td>
                    </tr>
                    <tr>
                        <td>العمليات</td>
                        <td>{{ $reports['operation'][0]->total }}</td>
                        <td>{{ $reports['operation'][0]->total }}</td>
                        <td>{{ $reports['operation'][0]->total }}</td>
                        <td>{{ $reports['operation'][0]->count }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <br>
        <div class="col-lg-12">
            <h2 class="title-1 m-b-25">العمال</h2>
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                    <tr>
                        <th>اسم العامل</th>
                        <th>عدد العملاء</th>
                        <th class="text-right">السعر</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($reports['workers'] as $report)
                            <tr>
                                <td>{{ $report->name }}</td>
                                <td>{{ $report->count }}</td>
                                <td class="text-right">{{ $report->total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
