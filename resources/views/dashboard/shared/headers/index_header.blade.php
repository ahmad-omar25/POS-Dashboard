<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h2 class="content-header-title">{{__('dashboard.'.$routeName.'.title')}} <small>( {{$rows->total()}} )</small> </h2>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}">{{__('global.dashboard')}}</a></li>
                    <li class="breadcrumb-item active">{{__('dashboard.'.$routeName.'.title')}}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
