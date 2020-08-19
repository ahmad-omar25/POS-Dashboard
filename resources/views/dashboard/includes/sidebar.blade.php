<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="dashboard"><a href="{{route('admin')}}"><i class="la la-home"></i><span>{{__('global.dashboard')}}</span></a></li>
            @if(auth()->user()->hasPermission('categories_read'))
                <li class="dashboard"><a href="{{route('categories.index')}}"><i class="la la-navicon"></i><span>{{__('dashboard.categories.title')}}</span></a></li>
            @endif
            @if(auth()->user()->hasPermission('products_read'))
                <li class="dashboard"><a href="{{route('products.index')}}"><i class="la la-navicon"></i><span>{{__('dashboard.products.title')}}</span></a></li>
            @endif
            @if(auth()->user()->hasPermission('clients_read'))
                <li class="dashboard"><a href="{{route('clients.index')}}"><i class="la la-navicon"></i><span>{{__('dashboard.clients.title')}}</span></a></li>
            @endif
            @if(auth()->user()->hasPermission('orders_read'))
                <li class="dashboard"><a href="{{route('orders.index')}}"><i class="la la-navicon"></i><span>{{__('dashboard.orders.title')}}</span></a></li>
            @endif
            @if(auth()->user()->hasPermission('users_read'))
                <li class="dashboard"><a href="{{route('users.index')}}"><i class="la la-navicon"></i><span>{{__('dashboard.users.title')}}</span></a></li>
            @endif
        </ul>
    </div>
</div>
