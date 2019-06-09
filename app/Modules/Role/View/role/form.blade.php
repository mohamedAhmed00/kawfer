@extends('layout')
@section('content-admin')
    @php
        $page = "role";
    @endphp
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">{{ !empty($role)? 'Edit Role' . $role->name : 'Create New Role' }}</div>
            <div class="card-body">
                <form action="{{ !empty($role)? route('auth.role.update',$role->id) : route('auth.role.store') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="control-label mb-1">Role Title</label>
                        <input id="name" name="name" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('name'))? !empty($role)?$role->name:''  : old('name') }}" type="text">
                    </div>

                    <div class=" form-group">
                        <div class="col">
                            <label for="redirect" class=" form-control-label">Select Redirect</label>
                        </div>
                        <div class="col-12">
                            <select name="redirect" id="redirect" class="form-control-md form-control">
                                <option >Please select Redirect</option>
                                <option value="auth.home" {{ (!empty($role) AND $role->redirect == 'auth.home')? 'selected' : '' }}>To Admin Dashboard</option>
                                <option value="public.home" {{ (!empty($role) AND $role->redirect == 'public.home')? 'selected' : '' }}>To public Account</option>

                            </select>
                        </div>
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
