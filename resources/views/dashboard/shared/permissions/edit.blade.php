<div class="card" style="height: 180px;">
    <div class="card-header px-0">
        <h4 class="card-title">{{__('global.permissions')}}</h4>
    </div>
    <div class="card-content">
        <div class="card-body p-0">
            @php
                $models = ['users', 'categories', 'products', 'clients', 'orders'];
                $maps = ['read', 'create', 'update', 'delete'];
            @endphp
            <ul class="nav nav-tabs nav-top-border no-hover-bg">
                @foreach($models as $index => $model)
                    <li class="nav-item">
                        <a class="nav-link {{$index == 0 ? 'active' : ''}}" id="base-tab11" data-toggle="tab" aria-controls="tab11" href="#{{$model}}" aria-expanded="true">{{__('global.'.$model)}}</a>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content px-1 pt-1">
                @foreach($models as $index => $model)
                    <div role="tabpanel" class="tab-pane {{$index == 0 ? 'active' : ''}}" id="{{$model}}" aria-expanded="true" aria-labelledby="base-tab11">
                        <div class="row mt-2">
                            @foreach($maps as $index => $map)
                                <div class="col-md-2">
                                    <fieldset class="checkboxsas">
                                        <label>
                                            <input type="checkbox" name="permissions[]" {{$row ?? ''->hasPermission($model. '_'.$map)? 'checked' : ''}} value="{{$model}}_{{$map}}"> {{__('global.' . $map)}}
                                        </label>
                                    </fieldset>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
