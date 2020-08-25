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
            <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="@if(app()->getLocale() == 'ar') flag-icon flag-icon-eg @else flag-icon flag-icon-gb @endif"></i><span class="selected-language"></span>
                    <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">2</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a class="dropdown-item" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    @endforeach
                </div>
            </li>
            <li class="dropdown dropdown-notification nav-item">
                <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                    <li class="dropdown-menu-header">
                        <h6 class="dropdown-header m-0">
                            <span class="grey darken-2">Notifications</span>
                        </h6>
                        <span class="notification-tag badge badge-default badge-danger float-right m-0">5 New</span>
                    </li>
                    <li class="scrollable-container media-list w-100">
                        <a href="javascript:void(0)">
                            <div class="media">
                                <div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                                <div class="media-body">
                                    <h6 class="media-heading">You have new order!</h6>
                                    <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                    <small>
                                        <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">30 minutes ago</time>
                                    </small>
                                </div>
                            </div>
                        </a>
                        <a href="javascript:void(0)">
                            <div class="media">
                                <div class="media-left align-self-center"><i class="ft-download-cloud icon-bg-circle bg-red bg-darken-1"></i></div>
                                <div class="media-body">
                                    <h6 class="media-heading red darken-1">99% Server load</h6>
                                    <p class="notification-text font-small-3 text-muted">Aliquam tincidunt mauris eu risus.</p>
                                    <small>
                                        <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Five hour ago</time>
                                    </small>
                                </div>
                            </div>
                        </a>
                        <a href="javascript:void(0)">
                            <div class="media">
                                <div class="media-left align-self-center"><i class="ft-alert-triangle icon-bg-circle bg-yellow bg-darken-3"></i></div>
                                <div class="media-body">
                                    <h6 class="media-heading yellow darken-3">Warning notifixation</h6>
                                    <p class="notification-text font-small-3 text-muted">Vestibulum auctor dapibus neque.</p>
                                    <small>
                                        <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Today</time>
                                    </small>
                                </div>
                            </div>
                        </a>
                        <a href="javascript:void(0)">
                            <div class="media">
                                <div class="media-left align-self-center"><i class="ft-check-circle icon-bg-circle bg-cyan"></i></div>
                                <div class="media-body">
                                    <h6 class="media-heading">Complete the task</h6>
                                    <small>
                                        <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last week</time>
                                    </small>
                                </div>
                            </div>
                        </a>
                        <a href="javascript:void(0)">
                            <div class="media">
                                <div class="media-left align-self-center"><i class="ft-file icon-bg-circle bg-teal"></i></div>
                                <div class="media-body">
                                    <h6 class="media-heading">Generate monthly report</h6>
                                    <small>
                                        <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last month</time>
                                    </small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all notifications</a></li>
                </ul>
            </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
