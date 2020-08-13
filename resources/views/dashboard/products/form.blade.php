@csrf
<div class="form-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                @php $input = "category_id" @endphp
                <label for="{{$input}}">{{__('dashboard.categories.title')}}</label>
                <select id="{{$input}}" name="category_id" class="form-control @error($input) is-invalid @enderror">
                    <option value="none" selected="" disabled="">{{__('dashboard.categories.all')}}</option>
                    @if($categories && $categories->count() > 0)
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"{{isset($row) && $row->{$input} == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                    @endif
                </select>
                @error($input)
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>
    @foreach(config('translatable.locales') as $locale)
        <div class="row">
            @php $input = "name" @endphp
            <div class="form-group col-12 mb-2">
                <label for="{{$input}}">{{__('dashboard.'.$routeName.'.'.$locale.'.name')}}</label>
                <input type="text" id="{{$input}}" class="form-control @error($locale.'.name') is-invalid @enderror"
                       name="{{$locale}}[{{$input}}]"
                       value="{{isset($row) ? $row->translate($locale)->name : old($locale.'.name')}} ">
                @error($locale.'.name')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
        </div>
        <div class="row">
            @php $input = "description" @endphp
            <div class="form-group col-12 mb-2">

                <label for="{{$input}}">{{__('dashboard.'.$routeName.'.'.$locale.'.description')}}</label>
                <textarea type="text" id="{{$input}}" rows="5" class="form-control @error($locale.'.description') is-invalid @enderror"
                          name="{{$locale}}[{{$input}}]">{{isset($row) ? $row->translate($locale)->description : old($locale.'.description')}}</textarea>
                @error($locale.'.description')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
        </div>
    @endforeach
    <div class="row">
        @php $input = "purchase_price" @endphp
        <div class="form-group col-12 mb-2">
            <label for="{{$input}}">{{__('dashboard.'.$routeName.'.purchase_price')}}</label>
            <input id="{{$input}}" class="form-control @error($input) is-invalid @enderror" step="0.01" name="{{$input}}"
                   value="{{isset($row) ? $row->purchase_price : old($input)}} ">
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="row">
        @php $input = "sale_price" @endphp
        <div class="form-group col-12 mb-2">
            <label for="{{$input}}">{{__('dashboard.'.$routeName.'.sale_price')}}</label>
            <input id="{{$input}}" class="form-control @error($input) is-invalid @enderror" step="0.01" name="{{$input}}"
                   value="{{isset($row) ? $row->sale_price : old($input)}} ">
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="row">
        @php $input = "stock" @endphp
        <div class="form-group col-12 mb-2">
            <label for="{{$input}}">{{__('dashboard.'.$routeName.'.stock')}}</label>
            <input id="{{$input}}" class="form-control @error($input) is-invalid @enderror" step="0.01" name="{{$input}}"
                   value="{{isset($row) ? $row->stock : old($input)}} ">
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="row">
        @php $input = "image" @endphp
        <div class="form-group col-12 mb-2">
            <label>{{__('dashboard.'.$routeName.'.image')}}</label>
            <label id="projectinput7" class="file center-block form-control @error($input) is-invalid @enderror">
                <input type="file" name="{{$input}}" id="file">
                <span class="file-custom"></span>
            </label>
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
