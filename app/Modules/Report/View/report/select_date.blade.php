@extends('layout')
@section('content-admin')
    @php
        $page = "report";
    @endphp
    <div class="row">
        <h3 class="col-12 my-4">عرض تقارير عن الفترة :  </h3>

        <div class="col-3">
            <h3 class="text-dark">أختار الفترة </h3>
        </div>
        <div class="col-9 form-group">
            <form action="{{ url('auth/report/get') }}" method="get">
                @csrf
                <div class="row">
                    <div class="col-9">
                        <input type="text" id="datefilter" placeholder="الفترة من الي" name="date" class="form-control">
                    </div>
                    <div class="col-3">
                        <input type="submit" class="form-control btn btn-secondary" value="عرض التقارير">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(function() {

            $('#datefilter').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            $('#datefilter').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
            });

            $('#datefilter').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });

        });
    </script>
@endsection
