@extends('layout')
@section('content-admin')
    @php
        $page = "operation";
    @endphp
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">{{ !empty($operationMeasure)? 'تعديل المقاس رقم  : ' . $operationMeasure->order : 'انشاء مقاس جديد ' }}</div>
            <div class="card-body">
                <form action="{{ !empty($operationMeasure)? route('auth.operation.measure.update',[$operationMeasure->id,$operationType->id]) : route('auth.operation.measure.store',[$operationType->id]) }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="order" class="control-label mb-1">الرقم</label>
                        <input id="order" name="order" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('order'))? !empty($operationMeasure)?$operationMeasure->order:''  : old('order') }}" type="number">
                    </div>

                    <div class="form-group">
                        <label for="min" class="control-label mb-1">اقل سعر</label>
                        <input id="min" name="min" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('min'))? !empty($operationMeasure)?$operationMeasure->min:''  : old('min') }}" type="number">
                    </div>

                    <div class="form-group">
                        <label for="max" class="control-label mb-1">اعلي سعر</label>
                        <input id="max" name="max" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('max'))? !empty($operationMeasure)?$operationMeasure->max:''  : old('max') }}" type="number">
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
