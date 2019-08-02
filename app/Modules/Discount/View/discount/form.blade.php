@extends('layout')
@section('content-admin')
    @php
        $page = "discount";
    @endphp
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">{{ !empty($discount)? 'تعديل التخفيض :' . $discount->name : ' أنشاء تخفيض جديد ' }}</div>
            <div class="card-body">
                <form action="{{ !empty($discount)? route('auth.discount.update',$discount->id) : route('auth.discount.store') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="percentage" class="control-label mb-1">نسبة التخفيض</label>
                        <input id="percentage" name="percentage" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('percentage'))? !empty($discount)?$discount->percentage:''  : old('percentage') }}" type="text">
                    </div>
                    <div class="text-center">
                        <button id="payment-button" type="submit" class="btn btn-md btn-info ">
                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                            <span id="payment-button-amount">حفظ</span>
                            <span id="payment-button-sending" style="display:none;">جاري الارسال</span>
                        </button>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
@endsection
