@if(auth()->user()->hasPermission($routeName.'_update'))
<a href="{{route($routeName.'.edit', $row->id)}}" class="btn btn-primary btn-sm">{{__('global.update')}} <i class="ft-edit"></i></a>
@else
    <a class="btn btn-primary btn-sm disabled" style="color: white;">{{__('global.update')}} <i class="ft-edit"></i></a>
@endif
