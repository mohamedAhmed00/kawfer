@extends('layout')
@section('content-admin')
    @php
        $page = "client";
        if(!empty($profile))
        {
            $arr = explode('|',$profile['hair_type']);
            list($from,$to) = $arr;
        }
    @endphp
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">{{  ' تعديل ملف العميل : ' . $client->name  }}</div>
            <div class="card-body">
                <form action="{{ !empty($profile)? route('auth.client.profile.update',[$client->id,$profile->id]) : route('auth.client.profile.store',$client->id) }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class=" form-group mb-5">
                        <div class="col">
                            <label for="hair_length" class=" form-control-label">طول الشعر</label>
                        </div>
                        <div class="col-12">
                            <select name="hair_length" id="hair_length" class="form-control-md form-control">
                                <option>اختار طول من 1 : 10</option>
                                @for($i=1 ; $i <= 10 ; $i++)
                                    <option value="{{ $i }}" {{ (!empty(old('hair_length')) AND old('hair_length') == $i) ?
                                     'selected' : (!empty($profile) and $profile->hair_length == $i)?'selected':''  }}>{{ $i }}</option>
                                @endfor

                            </select>
                        </div>
                    </div>
                    <hr>

                    <div class="row form-group mb-5">
                        <div class="col">
                            <label for="hair_status" class=" form-control-label">حالة الشعر</label>
                        </div>
                        <div class="col-12 form-check-inline form-check">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col">
                                        <label for="inline-radio1" class="form-check-label ">
                                            <input type="radio" id="inline-radio1" name="hair_status" {{ (!empty(old('hair_status')) AND old('hair_status') == 'شديد التالف') ?'checked' : (!empty($profile) and $profile->hair_status == 'شديد التالف')?'checked':''  }} value="شديد التالف" class="form-check-input">شديد التالف
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="inline-radio2" class="form-check-label ">
                                            <input type="radio" id="inline-radio2" name="hair_status" {{ (!empty(old('hair_status')) AND old('hair_status') == 'متوسط التالف') ?'checked' : (!empty($profile) and $profile->hair_status == 'متوسط التالف')?'checked':''  }} value="متوسط التالف" class="form-check-input">متوسط التالف
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="inline-radio3" class="form-check-label ">
                                            <input type="radio" id="inline-radio3" name="hair_status" {{ (!empty(old('hair_status')) AND old('hair_status') == 'طبيعي') ?'checked' : (!empty($profile) and $profile->hair_status == 'طبيعي')?'checked':''  }} value="طبيعي" class="form-check-input">طبيعي
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class=" form-group mb-5">
                        <div class="col">
                            <label for="hair_status" class=" form-control-label">نوع الشعر</label>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col">
                                    <label for="from" class=" form-control-label">من</label>
                                    <input id="from" name="from" class="form-control" aria-required="true" autocomplete="none" aria-invalid="false" value="{{  !empty($from)?$from : '' }}" type="text">

                                </div>
                                <div class="col">
                                    <label for="to" class=" form-control-label">الي</label>
                                    <input id="to" name="to" class="form-control" aria-required="true" autocomplete="none" aria-invalid="false" value="{{  !empty($to)?$to : '' }}" type="text">

                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row form-group mb-5">
                        <div class="col">
                            <label for="hair_density" class=" form-control-label">كثافة الشعر</label>
                        </div>
                        <div class="col-12 form-check-inline form-check">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col">
                                        <label for="inline-radio1" class="form-check-label ">
                                            <input type="radio" id="inline-radio1" name="hair_density" {{ (!empty(old('hair_density')) AND old('hair_density') == 'كثيف') ?'checked' : (!empty($profile) and $profile->hair_density == 'كثيف')?'checked':''  }} value="كثيف" class="form-check-input">كثيف
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="inline-radio2" class="form-check-label ">
                                            <input type="radio" id="inline-radio2" name="hair_density" {{ (!empty(old('hair_density')) AND old('hair_density') == 'متوسط') ?'checked' : (!empty($profile) and $profile->hair_density == 'متوسط')?'checked':''  }} value="متوسط" class="form-check-input">متوسط
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="inline-radio3" class="form-check-label ">
                                            <input type="radio" id="inline-radio3" name="hair_density" {{ (!empty(old('hair_density')) AND old('hair_density') == 'خفيف') ?'checked' : (!empty($profile) and $profile->hair_density == 'خفيف')?'checked':''  }} value="خفيف" class="form-check-input">خفيف
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="inline-radio4" class="form-check-label ">
                                            <input type="radio" id="inline-radio4" name="hair_density" {{ (!empty(old('hair_density')) AND old('hair_density') == 'خفيف جدا') ?'checked' : (!empty($profile) and $profile->hair_density == 'خفيف جدا')?'checked':''  }} value="خفيف جدا" class="form-check-input">خفيف جدا
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row form-group mb-5">
                        <div class="col">
                            <label for="hair_color" class=" form-control-label">لون الشعر</label>
                        </div>
                        <div class="col-12 form-check-inline form-check {{ !empty($profile->hair_color)? 'd-inline' : 'd-none' }}" id="color_container1" >
                            <div class="col-12">
                                <div class="row">
                                    <div class="col">
                                        <label for="inline-radio1" class="form-check-label ">
                                            <input type="radio" id="inline-radio1" name="hair_color" {{ (!empty(old('hair_color')) AND old('hair_color') == 'طبيعي') ?'checked' : (!empty($profile) and $profile->hair_color == 'طبيعي')?'checked':''  }} value="طبيعي" class="form-check-input">طبيعي
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="color_text" class="form-check-label ">
                                            <input type="radio" id="color_text" name="hair_color" {{ (!empty(old('hair_color')) AND old('hair_color') == 'صبغة') ?'checked' : (!empty($profile) and $profile->hair_color == 'صبغة')?'checked':''  }} value="صبغة" class="form-check-input">صبغة
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-4 {{ !empty($profile->hair_color)? 'd-none' : 'd-inline' }}" id="color_container2">
                            <div class="form-group">
                                <div class="col-12">
                                    <label for="inline-radio6" class="form-check-label float-right">
                                        <input type="radio" id="switcher2"  value="الرجوع للخيارات" class="form-check-input">الرجوع للخيارات
                                    </label>
                                </div>
                                <br>
                                <div class="col-12">
                                    <label for="color_input" class="control-label mb-1">ادخل المادة المستخدمه</label>
                                    <input id="color_input" name="other_color" class="form-control" aria-required="true" autocomplete="none" aria-invalid="false" value="{{ empty(old('other_color'))? !empty($profile)?$profile->other_color:''  : old('other_color') }}" type="text">
                                </div>

                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="row form-group mb-5">
                        <div class="col">
                            <label for="hair_last_operation" class=" form-control-label">المواد المستخدمه علي الشعر سابقا</label>
                        </div>
                        <div class="col-12 form-check-inline form-check {{ !empty($profile->other_hair_last_operation)? 'd-none' : 'd-inline' }}" id="hair_last_operation_container1">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col">
                                        <label for="inline-radio1" class="form-check-label ">
                                            <input type="radio" id="inline-radio1" name="hair_last_operation" {{ (!empty(old('hair_last_operation')) AND old('hair_last_operation') == 'بروتين') ?'checked' : (!empty($profile) and $profile->hair_last_operation == 'بروتين')?'checked':''  }} value="بروتين" class="form-check-input">بروتين
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="inline-radio2" class="form-check-label ">
                                            <input type="radio" id="inline-radio2" name="hair_last_operation" {{ (!empty(old('hair_last_operation')) AND old('hair_last_operation') == 'حناء') ?'checked' : (!empty($profile) and $profile->hair_last_operation == 'حناء')?'checked':''  }} value="حناء" class="form-check-input">حناء
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="inline-radio3" class="form-check-label ">
                                            <input type="radio" id="inline-radio3" name="hair_last_operation" {{ (!empty(old('hair_last_operation')) AND old('hair_last_operation') == 'حناء سوداء') ?'checked' : (!empty($profile) and $profile->hair_last_operation == 'حناء سوداء')?'checked':''  }} value="حناء سوداء" class="form-check-input">حناء سوداء
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="inline-radio4" class="form-check-label ">
                                            <input type="radio" id="inline-radio4" name="hair_last_operation" {{ (!empty(old('hair_last_operation')) AND old('hair_last_operation') == 'صبغة') ?'checked' : (!empty($profile) and $profile->hair_last_operation == 'صبغة')?'checked':''  }} value="صبغة" class="form-check-input">صبغة
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="inline-radio5" class="form-check-label ">
                                            <input type="radio" id="inline-radio5" name="hair_last_operation" {{ (!empty(old('hair_last_operation')) AND old('hair_last_operation') == 'سحب لون') ?'checked' : (!empty($profile) and $profile->hair_last_operation == 'سحب لون')?'checked':''  }} value="سحب لون" class="form-check-input">سحب لون
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="inline-radio6" class="form-check-label ">
                                            <input type="radio" id="inline-radio6" name="hair_last_operation" {{ (!empty(old('hair_last_operation')) AND old('hair_last_operation') == 'أخري') ?'checked' : (!empty($profile) and $profile->hair_last_operation == 'أخري')?'checked':''  }} value="أخري" class="form-check-input">أخري
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4 {{ !empty($profile->other_hair_last_operation)? 'd-inline' : 'd-none' }}" id="hair_last_operation_container2">
                            <div class="form-group">
                                <div class="col-12">
                                    <label for="inline-radio6" class="form-check-label float-right">
                                        <input type="radio" id="switcher"  value="الرجوع للخيارات" class="form-check-input">الرجوع للخيارات
                                    </label>
                                </div>
                                <br>
                                <div class="col-12">
                                    <label for="hair_last_operation1" class="control-label mb-1">ادخل المادة المستخدمه</label>
                                    <input id="hair_last_operation1" name="other_hair_last_operation" class="form-control" aria-required="true" autocomplete="none" aria-invalid="false" value="{{ empty(old('other_hair_last_operation'))? !empty($profile)?$profile->other_hair_last_operation:''  : old('other_hair_last_operation') }}" type="text">
                                </div>

                            </div>
                        </div>
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

@section('script')
<script>
    $(document).ready(function () {
        $("#inline-radio6").change(function(){
            if($('#inline-radio6:checked')) {
                $("#hair_last_operation_container2").removeClass('d-none');
                $("#hair_last_operation_container1").addClass('d-none');
                $("#switcher").prop('checked', false);
            }
        });

        $("#switcher").change(function (){
            if($('#switcher:checked')) {
                $("#hair_last_operation_container1").removeClass('d-none');
                $("#hair_last_operation_container2").addClass('d-none');
                $("#inline-radio6").prop('checked', false);
                $("#hair_last_operation1").val('');
            }
        })


        $("#color_text").change(function(){
            if($('#color_text:checked')) {
                $("#color_container2").removeClass('d-none');
                $("#color_container1").addClass('d-none');
                $("#switcher2").prop('checked', false);
            }
        });

        $("#switcher2").change(function (){
            if($('#switcher2:checked')) {
                $("#color_container1").removeClass('d-none');
                $("#color_container2").addClass('d-none');
                $("#color_text").prop('checked', false);
                $("#color_input").val('');
            }
        })
    })
</script>
@endsection
