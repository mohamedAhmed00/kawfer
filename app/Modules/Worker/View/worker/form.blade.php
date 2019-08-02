@extends('layout')
@section('content-admin')
    @php
        $page = "worker";
    @endphp
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">{{ !empty($worker)? 'تعديل العامل :' . $worker->name : ' أنشاء عامل جديد ' }}</div>
            <div class="card-body">
                <form action="{{ !empty($worker)? route('auth.worker.update',$worker->id) : route('auth.worker.store') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="control-label mb-1">اسم العامل</label>
                        <input id="name" name="name" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('name'))? !empty($worker)?$worker->name:''  : old('name') }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="job_title" class="control-label mb-1">المسمي الوظيفي</label>
                        <input id="job_title" name="job_title" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('job_title'))? !empty($worker)?$worker->job_title:''  : old('job_title') }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="phone_number" class="control-label mb-1">رقم الهاتف </label>
                        <input id="phone_number" name="phone_number" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('phone_number'))? !empty($worker)?$worker->phone_number:''  : old('phone_number') }}" type="number">
                    </div>
                    <div class="form-group">
                        <label for="age" class="control-label mb-1">السن</label>
                        <input id="age" name="age" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('age'))? !empty($worker)?$worker->age:''  : old('age') }}" type="number">
                    </div>

                    <div class="form-group">
                        <label for="passport_image" class="control-label mb-1">صورة جواز السفر</label>
                        <input id="passport_image" name="passport_image" class="form-control"
                               autocomplete="none" aria-required="true" aria-invalid="false" aria-describedby="passport_image" type="file">
                    </div>

                    <div class="form-group">
                        <label for="passport_expiration_age" class="control-label mb-1">تاريخ انتهاء جواز السفر</label>
                        <input id="passport_expiration_age" name="passport_expiration_age" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('health_certificate_age'))? !empty($worker)?$worker->passport_expiration_age:''  : old('passport_expiration_age') }}" type="date">
                    </div>

                    <div class="form-group">
                        <label for="health_certificate_id" class="control-label mb-1">صورة الشهادة الصحية</label>
                        <input id="health_certificate_id" name="health_certificate_id" class="form-control"
                               autocomplete="none" aria-required="true" aria-invalid="false" aria-describedby="health_certificate_id" type="file">
                    </div>

                    <div class="form-group">
                        <label for="health_certificate_expiration_age" class="control-label mb-1">تاريخ انتهاء الشهادة الصحية</label>
                        <input id="health_certificate_expiration_age" name="health_certificate_expiration_age" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('health_certificate_expiration_age'))? !empty($worker)?$worker->health_certificate_expiration_age:''  : old('health_certificate_expiration_age') }}" type="date">
                    </div>

                    <div class="form-group">
                        <label for="national_id" class="control-label mb-1">صورة بطاقة الرقم القومي</label>
                        <input id="national_id" name="national_id" class="form-control"
                               autocomplete="none" aria-required="true" aria-invalid="false" aria-describedby="national_id" type="file">
                    </div>
                    <div class="form-group">
                        <label for="national_expiration_age" class="control-label mb-1">تاريخ انتهاء بطاقة الرقم القومي</label>
                        <input id="national_expiration_age" name="national_expiration_age" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('national_expiration_age'))? !empty($worker)?$worker->national_expiration_age:''  : old('national_expiration_age') }}" type="date">
                    </div>
                    <div class="text-center">
                        <button id="payment-button" type="submit" class="btn btn-md btn-info ">
                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                            <span id="payment-button-amount">حفظ</span>
                            <span id="payment-button-sending" style="display:none;">جاري الارسال</span>
                        </button>
                    </div>
                    <br>
                    <div class="row">
                        @if(!empty($worker->passport_image))
                            <div class="col-md-4 col-sm-12">
                                <h5 class="text-center my-2">صورة جواز السفر</h5>
                                <img src="{{ asset($worker->passport_image )}}" style="height: initial" alt="">
                            </div>
                        @endif
                        @if(!empty($worker->health_certificate_id))
                                <div class="col-md-4 col-sm-12">
                                <h5 class="text-center my-2">صورة الشهادة الصحية</h5>
                                <img src="{{ asset($worker->health_certificate_id )}}" style="height: initial" alt="">
                            </div>
                        @endif
                        @if(!empty($worker->national_id))
                                <div class="col-md-4 col-sm-12">
                                <h5 class="text-center my-2">صورة بطاقة الرقم القومي</h5>
                                <img src="{{ asset($worker->national_id )}}" style="height: initial" alt="">
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
