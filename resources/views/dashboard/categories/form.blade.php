@csrf
<div class="form-body">

  @foreach(config('translatable.locales') as $locale)
    <div class="row">
      @php $input = "name" @endphp
      <div class="form-group col-12 mb-2">
        <label for="{{$input}}">{{__('dashboard.'.$routeName.'.'.$locale.'.name')}}</label>
        <input type="text" id="{{$input}}" class="form-control @error($locale.'.name') is-invalid @enderror" name="{{$locale}}[{{$input}}]"
               value="{{isset($row) ? $row->translate($locale)->name : old($locale.'.name')}} ">
        @error($locale.'.name')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
    </div>
  @endforeach
</div>
