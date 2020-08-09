<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
@include('dashboard.includes.head')
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu" data-col="2-columns">
<!-- fixed-top-->
@include('dashboard.includes.navbar')
@include('dashboard.includes.sidebar')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">

        </div>
        @yield('content')
    </div>
</div>
@include('dashboard.includes.footer')
@include('dashboard.includes.scripts')
</body>
</html>
