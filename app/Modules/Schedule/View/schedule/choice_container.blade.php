@foreach($operationTypes as $type)
    <div class="col-6">
        <div class="row">
            <div class="col-4">
                <div class="row form-group">
                    <div class="col-12">
                        <label class=" form-control-label">{{ $type->title }}</label>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            @foreach($type->measures as $measure)
                                <div class="radio">
                                    <label for="radio{{ $measure->id }}" class="form-check-label ">
                                        <input id="radio{{ $measure->id }}" name="operation_type_measure_id" value="{{ $measure->id }}" class="form-check-input" title="{{ $measure->max }}" type="radio">{{ $measure->order }}  : {{ $measure->max }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div> 
            <div class="col-6" style="height: auto">
                <img style="height: auto" src="{{ asset('admin/images/hair.jpeg') }}" alt="">
            </div>
        </div>

    </div>
@endforeach
