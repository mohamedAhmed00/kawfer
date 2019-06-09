@extends('layout')
@section('content-admin')
    @php
        $page = "worker";
    @endphp
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">All Workers</h3>
            <div class="table-data__tool float-lg-right">
                <div class="table-data__tool-right">
                    <a href="{{ route('auth.worker.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>add item
                    </a>
                </div>
            </div>
            <div class="table-responsive table-responsive-data2">

                <table class="table table-data2">
                    <thead>
                    <tr class="text-center">
                        <th># Worker</th>
                        <th>name</th>
                        <th>phone number</th>
                        <th>age</th>
                        <th>Created At</th>
                        <th class="text-right pr-5">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($workers as $worker)
                        <tr class="tr-shadow text-center">
                            <td><a href="{{ route('auth.worker.edit',$worker->id) }}">{{ $loop->iteration }}</a></td>
                            <td>{{ $worker->name }}</td>
                            <td><span class="status--denied">{{ $worker->phone_number }}</span></td>
                            <td><span class="status--process">{{ $worker->age }}</span></td>
                            <td><span class="status--process">{{ $worker->created_at->diffForHumans() }}</span></td>
                            <td>
                                <div class="table-data-feature text-center">
                                    <a href="{{ route('auth.worker.edit',$worker->id) }}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </a>
                                    <a href="{{ route('auth.worker.delete',$worker->id) }}" class="item delete" data-toggle="tooltip" data-placement="top" title="Delete">
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

@section('delete-script')
    <script>
        $(".delete").on("click", function(){
            return confirm("Do you want to delete this item?");
        });
    </script>
@endsection
