@csrf
<div class="form-body">
  <div class="row">
    @php $input = "first_name" @endphp
    <div class="form-group col-12 mb-2">
      <label for="{{$input}}">{{__('dashboard.'.$routeName.'.first_name')}}</label>
      <input type="text" id="{{$input}}" class="form-control @error($input) is-invalid @enderror" name="{{$input}}"
             value="{{isset($row) ? $row->first_name : (old($input))}} ">
      @error($input)
      <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
      @enderror
    </div>
  </div>
  <div class="row">
    @php $input = "last_name" @endphp
    <div class="form-group col-12 mb-2">
      <label for="{{$input}}">{{__('dashboard.'.$routeName.'.last_name')}}</label>
      <input type="text" id="{{$input}}" class="form-control @error($input) is-invalid @enderror" name="{{$input}}"
             value="{{isset($row) ? $row->last_name : (old($input))}} ">
      @error($input)
      <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
      @enderror
    </div>
  </div>
  <div class="row">
    @php $input = "email" @endphp
    <div class="form-group col-12 mb-2">
      <label for="{{$input}}">{{__('dashboard.'.$routeName.'.email')}}</label>
      <input id="{{$input}}" class="form-control @error($input) is-invalid @enderror" name="{{$input}}"
             value="{{isset($row) ? $row->email : (old($input))}} ">
      @error($input)
      <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
      @enderror
    </div>
  </div>
  <div class="row">
    @php $input = "password" @endphp
    <div class="form-group col-6 mb-2">
      <label for="{{$input}}">{{__('dashboard.'.$routeName.'.password')}}</label>
      <input type="password" id="{{$input}}" class="form-control @error($input) is-invalid @enderror" name="{{$input}}">
      @error($input)
      <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
            </span>
      @enderror
    </div>
    @php $input = "password_confirmation" @endphp
    <div class="form-group col-6 mb-2">
      <label for="{{$input}}">{{__('dashboard.'.$routeName.'.password_confirmation')}}</label>
      <input type="password" id="{{$input}}" class="form-control @error($input) is-invalid @enderror" name="{{$input}}">
      @error($input)
      <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
            </span>
      @enderror
    </div>
  </div>
</div>
