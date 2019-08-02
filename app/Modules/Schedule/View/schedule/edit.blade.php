@extends('layout')
@section('content-admin')
    @php
        $page = "schedule";
    @endphp
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">تعديل الحجز</div>
            <div class="card-body">
                <form action="{{ route('auth.schedule.update',[$schedule->id,$date]) }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>اختار العامل : </label>
                        <select class="selectpicker" name="worker_id" data-live-search="true">
                            <option data-tokens="0">اختار العامل</option>
                            @foreach($workers as $worker)
                                <option data-tokens="{{ $worker->id }}"
                                        value="{{ $worker->id }}" {{ $schedule->worker_id === $worker->id ? 'selected' : '' }}>{{ $worker->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class=" form-group">
                        <div class="col">
                            <label for="status" class=" form-control-label">تغيير حالة الحجز</label>
                        </div>
                        <div class="col-12">
                            <select name="status" id="status" class="form-control-md form-control">
                                <option >اختار الحالة</option>
                                <option value="opened" {{ (!empty($schedule) AND $schedule->status == 'opened')? 'selected' : '' }}>العملية مفتوحة</option>
                                <option value="finished" {{ (!empty($schedule) AND $schedule->status == 'finished')? 'selected' : '' }}>انهاء العملية</option>

                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="date" value="{{ $date }}">
                    <div class="text-center">
                        <button id="payment-button" type="submit" class="btn btn-md btn-info ">
                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                            <span id="payment-button-amount">حجز</span>
                            <span id="payment-button-sending" style="display:none;">جاري الارسال</span>
                        </button>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
@endsection
