@extends('layout')
@section('content-admin')
    @php
        $page = "setting";
    @endphp
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">All Settings</h3>
            <div class="table-data__tool float-lg-right">
                <div class="table-data__tool-right">
                    <a href="{{ route('auth.setting.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>add item
                    </a>
                </div>
            </div>
            <div class="table-responsive table-responsive-data2">

                <table class="table table-data2">
                    <thead>
                    <tr class="text-center">
                        <th># Setting</th>
                        <th>key</th>
                        <th>value</th>
                        <th>Created At</th>
                        <th class="text-right pr-5">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($settings as $setting)
                        <tr class="tr-shadow text-center">
                            <td><a href="{{ route('auth.setting.edit',$setting->id) }}">{{ $loop->iteration }}</a></td>
                            <td>{{ $setting->key }}</td>
                            <td class="account-item text-center">
                                @if($setting->type == "image")
                                    <img src="{{ asset($setting->value)}}" class="image float-none" alt="">
                                @else
                                    {{ $setting->value }}
                                @endif
                            </td>
                            <td><span class="status--process">{{ $setting->created_at->diffForHumans() }}</span></td>
                            <td>
                                <div class="table-data-feature text-center">
                                    <a href="{{ route('auth.setting.edit',$setting->id) }}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </a>
                                    <a href="{{ route('auth.setting.delete',$setting->id) }}" class="item delete" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="zmdi zmdi-delete"></i>
                                    </a>
                                </div>
                            </td>
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

@section('script')
    <script>
        $(".delete").on("click", function(){
            return confirm("Do you want to delete this item?");
        });
    </script>
@endsection
