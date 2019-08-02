@extends('layout')
@section('content-admin')
    @php
        $page = "operation";
    @endphp
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">{{ !empty($operationType)? 'تعديل النوع : ' . $operationType->title : 'انشاء نوع جديد ' }}</div>
            <div class="card-body">
                <form action="{{ !empty($operationType)? route('auth.operation.type.update',[$operationType->id,$operation->id]) : route('auth.operation.type.store',[$operation->id]) }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="control-label mb-1">النوع</label>
                        <input id="title" name="title" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('title'))? !empty($operationType)?$operationType->title:''  : old('title') }}" type="text">
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
