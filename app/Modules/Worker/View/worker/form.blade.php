@extends('layout')
@section('content-admin')
    @php
        $page = "worker";
    @endphp
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">{{ !empty($worker)? 'Edit Worker' . $worker->name : 'Create New Worker' }}</div>
            <div class="card-body">
                <form action="{{ !empty($worker)? route('auth.worker.update',$worker->id) : route('auth.worker.store') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="control-label mb-1">Worker Title</label>
                        <input id="name" name="name" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('name'))? !empty($worker)?$worker->name:''  : old('name') }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="phone_number" class="control-label mb-1">Worker Phone number</label>
                        <input id="phone_number" name="phone_number" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('phone_number'))? !empty($worker)?$worker->phone_number:''  : old('phone_number') }}" type="number">
                    </div>
                    <div class="form-group">
                        <label for="age" class="control-label mb-1">Worker Age</label>
                        <input id="age" name="age" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('age'))? !empty($worker)?$worker->age:''  : old('age') }}" type="number">
                    </div>

                    <div class="text-center">
                        <button id="payment-button" type="submit" class="btn btn-md btn-info ">
                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                            <span id="payment-button-amount">Save</span>
                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
