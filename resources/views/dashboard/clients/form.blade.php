@csrf
<div class="form-body">
    <div class="row">
      @php $input = "name" @endphp
      <div class="form-group col-12 mb-2">
          <label for="{{$input}}">{{__('dashboard.'.$routeName.'.name')}}</label>
        <input type="text" id="{{$input}}" class="form-control @error($input) is-invalid @enderror" name="{{$input}}"
               value="{{isset($row) ? $row->{$input} : old($input)}} ">
        @error($input)
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
    </div>
    <div class="row">
        @php $input = "phone" @endphp
        <div class="form-group col-12 mb-2">
            <label for="{{$input}}">{{__('dashboard.'.$routeName.'.phone')}}</label>
            <input type="text" id="{{$input}}" class="form-control @error('phone') is-invalid @enderror" name="{{$input}}"
                   value="{{$row->phone ?? ''}} ">
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="row">
        @php $input = "address" @endphp
        <div class="form-group col-12 mb-2">
            <label for="{{$input}}">{{__('dashboard.'.$routeName.'.address')}}</label>
            <input type="text" id="{{$input}}" class="form-control @error($input) is-invalid @enderror" name="{{$input}}"
                   value="{{isset($row) ? $row->{$input} : old($input)}} ">
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
