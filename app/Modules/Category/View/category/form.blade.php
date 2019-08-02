@extends('layout')
@section('content-admin')
    @php
        $page = "category";
    @endphp
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">{{ !empty($category)? ' تعديل القسم ' . $category->name : ' انشاء قسم جديد ' }}</div>
            <div class="card-body">
                <form action="{{ !empty($category)? route('auth.category.update',$category->id) : route('auth.category.store') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="control-label mb-1">اسم القسم </label>
                        <input id="name" name="name" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('name'))? !empty($category)?$category->name:''  : old('name') }}" type="text">
                    </div>
                    <div class="form-group has-success">
                        <label for="image" class="control-label mb-1">صورة القسم</label>
                        <input id="image" name="image" class="form-control"
                               autocomplete="none" aria-required="true" aria-invalid="false" aria-describedby="image" type="file">
                    </div>
                    <div class="text-center">
                        <button id="payment-button" type="submit" class="btn btn-md btn-info ">
                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                            <span id="payment-button-amount">حفظ</span>
                            <span id="payment-button-sending" style="display:none;">جاري الأرسال</span>
                        </button>
                    </div>

                    @if(!empty($category->image))
                        <img src="{{ asset($category->image )}}" style="width: 250px; height: 200px;" alt="">
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
