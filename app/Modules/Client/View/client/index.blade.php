@extends('layout')
@section('content-admin')
    @php
        $page = "client";
    @endphp
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">كل العملاء</h3>
            @can('create', \App\Modules\Client\Model\Client::class)
                <div class="table-data__tool float-lg-right">
                    <div class="table-data__tool-right">
                        <a href="{{ route('auth.client.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i> اضافة عميل
                        </a>
                    </div>
                </div>
            @endcan
            <div class="table-responsive table-responsive-data2">

                <table class="table table-data2">
                    <thead>
                    <tr class="text-center">
                        @can('update', \App\Modules\Client\Model\Client::class)
                            <th># العميل</th>
                        @endcan
                        <th>الاسم</th>
                        <th>الصورة</th>
                        <th>اسم الحساب</th>
                        <th>البريد الالكتروني</th>
                        <th>رقم الجوال</th>
                        <th>عرض الملف الشخصي</th>
                        <th>تاريخ الانشاء</th>

                        @can('update', \App\Modules\Client\Model\Client::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @elsecan('delete', \App\Modules\Client\Model\Client::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr class="tr-shadow text-center">
                            @can('update', \App\Modules\Client\Model\Client::class)
                                <td><a href="{{ route('auth.client.edit',$client->id) }}">{{ $loop->iteration }}</a></td>
                            @endcan
                            <td>{{ $client->name }}</td>
                            <td class="account-item text-center"><img src="{{ asset($client->image )}}"
                                                                      class="image float-none" alt=""></td>
                            <td><span class="status--process">{{ $client->username }}</span></td>
                            <td><span class="status--process">{{ $client->email }}</span></td>
                            <td><span class="status--process">{{ $client->phone_number }}</span></td>
                            <td>
                                @can('view-profile', \App\Modules\Client\Model\Client::class)
                                    <a href="{{ route('auth.client.profile.edit',$client->id) }}">عرض الملف الشخصي</a>
                                @endcan
                            </td>
                            <td><span class="status--process">{{ $client->created_at->diffForHumans() }}</span></td>

                            @if (Auth::user()->can('update', $client) Or Auth::user()->can('delete', $client))
                                <td>
                                    <div class="table-data-feature text-center">
                                        @can('update', \App\Modules\Client\Model\Client::class)
                                            <a href="{{ route('auth.client.edit',$client->id) }}" class="item"
                                               data-toggle="tooltip" data-placement="top" title="تعديل">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                        @endcan
                                        @can('delete', \App\Modules\Client\Model\Client::class)
                                                <a href="{{ route('auth.client.delete',$client->id) }}" class="item delete"
                                                   data-toggle="tooltip" data-placement="top" title="حذف">
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
            return confirm("هل تريد حقا حذف هذا العميل");
        });
    </script>
@endsection
