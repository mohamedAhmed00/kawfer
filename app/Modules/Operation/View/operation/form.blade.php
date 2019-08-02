@extends('layout')
@section('content-admin')
    @php
        $page = "operation";
    @endphp
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">{{ !empty($operation)? 'تعديل العملية : ' . $operation->name : 'انشاء عملية جديدة ' }}</div>
            <div class="card-body">
                <form action="{{ !empty($operation)? route('auth.operation.update',$operation->id) : route('auth.operation.store') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="control-label mb-1">اسم العملية</label>
                        <input id="name" name="name" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('name'))? !empty($operation)?$operation->name:''  : old('name') }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="price" class="control-label mb-1">سعر العملية</label>
                        <input id="price" name="price" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('price'))? !empty($operation)?$operation->price:''  : old('price') }}" type="number">
                    </div>


                    <div class="text-center">
                        <button id="payment-button" type="submit" class="btn btn-md btn-info ">
                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                            <span id="payment-button-amount">حفظ</span>
                            <span id="payment-button-sending" style="display:none;">جاري الارسال</span>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
