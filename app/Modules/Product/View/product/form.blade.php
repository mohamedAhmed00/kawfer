@extends('layout')
@section('content-admin')
    @php
        $page = "product";
    @endphp
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">{{ !empty($product)? 'Edit Product' . $product->name : 'Create New Product' }}</div>
            <div class="card-body">
                <form action="{{ !empty($product)? route('auth.product.update',$product->id) : route('auth.product.store') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="control-label mb-1">Product Title</label>
                        <input id="name" name="name" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('name'))? !empty($product)?$product->name:''  : old('name') }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="control-label mb-1">Product Quantity</label>
                        <input id="quantity" name="quantity" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('quantity'))? !empty($product)?$product->quantity:''  : old('quantity') }}" type="number">
                    </div>
                    <div class="form-group">
                        <label for="actual_price" class="control-label mb-1">Product Actual Price</label>
                        <input id="actual_price" name="actual_price" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('actual_price'))? !empty($product)?$product->actual_price:''  : old('actual_price') }}" type="number">
                    </div>
                    <div class="form-group">
                        <label for="final_price" class="control-label mb-1">Product Final Price</label>
                        <input id="final_price" name="final_price" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('final_price'))? !empty($product)?$product->final_price:''  : old('final_price') }}" type="number">
                    </div>
                    <div class="form-group">
                        <label for="description" class="control-label mb-1">Product Description</label>
                        <textarea id="description" name="description" class="form-control" style="resize: none;height: 250px" aria-required="true" autocomplete="none" aria-invalid="false">{{ empty(old('description'))? !empty($product)?$product->description:''  : old('description') }}</textarea>
                    </div>

                    <div class=" form-group">
                        <div class="col">
                            <label for="category_id" class=" form-control-label">Select Category</label>
                        </div>
                        <div class="col-12">
                            <select name="category_id" id="category_id" class="form-control-md form-control">
                                <option value="0">Please select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ (!empty(old('category_id')) AND old('category_id') == $category->id) ? 'selected' : (!empty($product) and $product->category_id == $category->id)?'selected':''  }}>{{ $category->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="form-group has-success">
                        <label for="image" class="control-label mb-1">Product Image</label>
                        <input id="image" name="image" class="form-control"
                               autocomplete="none" aria-required="true" aria-invalid="false" aria-describedby="image" type="file">
                    </div>
                    <div class="text-center">
                        <button id="payment-button" type="submit" class="btn btn-md btn-info ">
                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                            <span id="payment-button-amount">Save</span>
                            <span id="payment-button-sending" style="display:none;">Sending…</span>
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
