@extends('layout')
@section('content-admin')
    @php
        $page = "reservation-today";
    @endphp
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">انشاء حجز في نفس اليوم</div>
            <div class="card-body">
                <form action="{{ route('auth.reservation.today.store') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>اختار العميل : </label>
                        <select class="selectpicker" name="client_id" data-live-search="true">
                            <option data-tokens="0">اختار العميل</option>
                        @foreach($clients as $client)
                                <option data-tokens="{{ $client->id }}" value="{{ $client->id }}">{{ $client->name }}: {{ $client->phone_number }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>اختار العامل : </label>
                        <select class="selectpicker" name="worker_id" data-live-search="true">
                            <option data-tokens="0">اختار العامل</option>
                            @foreach($workers as $worker)
                                <option data-tokens="{{ $worker->id }}" value="{{ $worker->id }}">{{ $worker->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>اختار العملية : </label>
                        <select class="selectpicker" id="selectedOperation" name="operation_id" data-live-search="true">
                            <option data-tokens="0" selected>اختار العملية</option>
                        @foreach($operations as $operation)
                                <option data-tokens="{{ $operation->id }}" value="{{ $operation->id }}">{{ $operation->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row" id="choice_container">

                    </div>

                    <div class=" form-group d-none" id="discount_select">
                        <div class="col">
                            <label for="discount_id" class=" form-control-label">اختار التخفيض</label>
                        </div>
                        <div class="col-12">
                            <select name="operation_discount_id" id="discount_id" class="form-control-md form-control">
                                <option selected value="">اختار التخفيض</option>
                                @foreach($discounts as $discount)
                                    <option value="{{ $discount->percentage }}">{{ $discount->percentage }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class=" form-group d-none" id="price_container">
                        <div class="col">
                            <label class=" form-control-label">السعر النهائي : </label>
                        </div>
                        <div class="col-12">
                            <h4 id="total"></h4>
                            <input type="hidden" name="total" id="final_price">
                        </div>
                    </div>

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

@section('script')
    <script>
        $(document).ready(function () {
            let value = $(this).val();
            if(value)
            {
                $.ajax({
                    type: 'GET',
                    url: `{{ url('/auth/reservation/operation' ) }}/${value}` ,
                    success: function (res) {
                        $("#choice_container").html(res.data);
                    }
                });
            }

            $("body").on('change','#selectedOperation',function () {
                let value = $(this).val();
                if(value)
                {
                    $.ajax({
                        type: 'GET',
                        url: `{{ url('/auth/reservation/operation' ) }}/${value}` ,
                        success: function (res) {
                            $("#choice_container").html(res.data);
                            $("#discount_select").removeClass('d-none')
                        }
                    });
                }
            });

            $('#choice_container').on('change','.form-check-input',function () {
                let max = $(this).attr('title');
                let per = $("#discount_id").val();
                if(!isNaN(per)) {
                    let final = Number(max) - ( Number(max) * ( Number(per) / 100 ) );
                    $('#total').html(final);
                    $("#final_price").val(final);
                } else {
                    $('#total').html(max);
                    $("#final_price").val(max);
                }

                $('#price_container').removeClass('d-none');

            })

            $("body").on('change','#discount_id',function () {
                let per = $(this).val();
                let price = $('#total').html();

                let final = Number(price) - ( Number(price) * ( Number(per) / 100 ) );
                $('#total').html(final);
                $("#final_price").val(final);
            });
        });
    </script>
@endsection
