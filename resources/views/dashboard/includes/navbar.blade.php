<nav
  class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
  <div class="navbar-wrapper">
    <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item mobile-menu d-md-none mr-auto"><a
            class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
              class="ft-menu font-large-1"></i></a></li>
        <li class="nav-item">
          <a class="navbar-brand" href="index.html">
            <img class="brand-logo" alt="modern admin logo" src="{{asset('dashboard/images/logo/logo.png')}}">
            <h3 class="brand-text">Modern Admin</h3>
          </a>
        </li>
        <li class="nav-item d-md-none">
          <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
              class="la la-ellipsis-v"></i></a>
        </li>
      </ul>
    </div>
    <div class="navbar-container content">
      <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="nav navbar-nav mr-auto float-left">
          <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                class="ft-menu"></i></a></li>
          <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i
                class="ficon ft-search"></i></a>
            <div class="search-input">
              <input class="input" type="text" placeholder="Explore Modern...">
            </div>
          </li>
        </ul>
        <ul class="nav navbar-nav float-right">
          <li class="dropdown dropdown-user nav-item">
            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">{{__('global.hello')}}
                  <span class="user-name text-bold-700">
                     {{auth()->user()->first_name}} {{auth()->user()->last_name}}
                  </span>
                </span>
              <span class="avatar avatar-online">
                  <img src="{{asset('dashboard/images/portrait/small/avatar-s-19.png')}}" alt="avatar"><i></i></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{route('user.profile', auth()->user()->id)}}"><i
                  class="ft-user"></i>{{ __('global.edit_profile') }}</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                  class="ft-power"></i>{{ __('global.logout') }}</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
          <li class="dropdown dropdown-notification nav-item">
            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="la la-globe" style="font-size:1.7rem"></i></a>
            <ul class="dropdown-menu dropdown-menu-right">

              @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li class="dropdown-menu-footer">
                  <a class="dropdown-item text-muted text-center" rel="alternate" hreflang="{{ $localeCode }}"
                     href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    {{ $properties['native'] }}
                  </a>
                </li>
              @endforeach
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
