<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="{{route('admin')}}"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.scrumboard.main">{{__('global.dashboard')}}</span></a>
            </li>
            @if(auth()->user()->hasPermission('categories_read'))
                <li class=" nav-item"><a href="{{route('categories.index')}}"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.scrumboard.main">{{__('dashboard.categories.title')}}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{\App\Models\Category::count()}}</span></a>
                </li>
            @endif
            @if(auth()->user()->hasPermission('products_read'))
            <li class=" nav-item"><a href="{{route('products.index')}}"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.scrumboard.main">{{__('dashboard.products.title')}}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{\App\Models\Product::count()}}</span></a>
            </li>
            @endif
            @if(auth()->user()->hasPermission('clients_read'))
                <li class=" nav-item"><a href="{{route('clients.index')}}"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.scrumboard.main">{{__('dashboard.clients.title')}}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{\App\Models\Client::count()}}</span></a>
                </li>
            @endif
            @if(auth()->user()->hasPermission('orders_read'))
                <li class=" nav-item"><a href="{{route('orders.index')}}"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.scrumboard.main">{{__('dashboard.orders.title')}}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{\App\Models\Order::count()}}</span></a>
                </li>
            @endif
            @if(auth()->user()->hasPermission('users_read'))
                <li class=" nav-item"><a href="{{route('users.index')}}"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.scrumboard.main">{{__('dashboard.users.title')}}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{\App\User::whereRoleIs('admin')->count()}}</span></a>
                </li>
            @endif
        </ul>
    </div>
</div>
