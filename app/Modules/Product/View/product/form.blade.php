@extends('layout')
@section('content-admin')
    @php
        $page = "product";
    @endphp
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">{{ !empty($product)? 'تعديل المنتج ' . $product->name : 'انشاء منتج جديد ' }}</div>
            <div class="card-body">
                <form action="{{ !empty($product)? route('auth.product.update',$product->id) : route('auth.product.store') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="control-label mb-1">اسم المنتج</label>
                        <input id="name" name="name" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('name'))? !empty($product)?$product->name:''  : old('name') }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="qr_code" class="control-label mb-1">باركود المنتج</label>
                        <input id="qr_code" name="qr_code" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('qr_code'))? !empty($product)?$product->qr_code:''  : old('qr_code') }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="control-label mb-1">كمية المنتج</label>
                        <input id="quantity" name="quantity" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('quantity'))? !empty($product)?$product->quantity:''  : old('quantity') }}" type="number">
                    </div>

                    <div class="form-group">
                        <label for="min_quantity_available" class="control-label mb-1">الحد الادني للكمية التي يجب ان لا يتعدها المنتج</label>
                        <input id="min_quantity_available" name="min_quantity_available" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('min_quantity_available'))? !empty($product)?$product->min_quantity_available:''  : old('min_quantity_available') }}" type="number">
                    </div>
                    <div class="form-group">
                        <label for="actual_price" class="control-label mb-1">السعر الاصلي</label>
                        <input id="actual_price" name="actual_price" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('actual_price'))? !empty($product)?$product->actual_price:''  : old('actual_price') }}" type="number">
                    </div>
                    <div class="form-group">
                        <label for="final_price" class="control-label mb-1">السعر النهائي</label>
                        <input id="final_price" name="final_price" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('final_price'))? !empty($product)?$product->final_price:''  : old('final_price') }}" type="number">
                    </div>
                    <div class="form-group">
                        <label for="description" class="control-label mb-1">وصف المنتج</label>
                        <textarea id="description" name="description" class="form-control" style="resize: none;height: 250px" aria-required="true" autocomplete="none" aria-invalid="false">{{ empty(old('description'))? !empty($product)?$product->description:''  : old('description') }}</textarea>
                    </div>

                    <div class=" form-group">
                        <div class="col">
                            <label for="category_id" class=" form-control-label">اختار قسم</label>
                        </div>
                        <div class="col-12">
                            <select name="category_id" id="category_id" class="form-control-md form-control">
                                <option>اختار قسم</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ (!empty(old('category_id')) AND old('category_id') == $category->id) ? 'selected' : (!empty($product) and $product->category_id == $category->id)?'selected':''  }}>{{ $category->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="form-group has-success">
                        <label for="image" class="control-label mb-1">صورة المنتج</label>
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

                    @if(!empty($product->image))
                        <img src="{{ asset($product->image )}}" style="width: 250px; height: 200px;" alt="">
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
