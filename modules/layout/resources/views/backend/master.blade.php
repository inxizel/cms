<!doctype html>
<html lang="{{ \App::getLocale() }}">
<head>

    @include('layout::backend.head')

    @yield('style')
</head>
<body>
    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href=""><span>[</span>{{ env('APP_NAME') }}<span>]</span></a></div>
    <div class="br-sideleft overflow-y-auto">
        <div class="br-sideleft-menu">

            <label class="sidebar-label pd-x-15 mg-t-20">@lang('global.all')</label>
            <a href="{{ route('layout.index') }}" class="br-menu-link {{ request()->is('admin') ? 'active' : '' }}">
                <div class="br-menu-item">
                    <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                    <span class="menu-item-label">@lang('global.dashboard')</span>
                </div><!-- menu-item -->
            </a><!-- br-menu-link -->

            <label class="sidebar-label pd-x-15 mg-t-20">@lang('global.modules')</label>
            @if( isset($menu_functions)) @foreach($menu_functions as $menu_function)
                <a href="/admin/{{$menu_function->name}}" class="br-menu-link {{ request()->is("*$menu_function->name*") ? 'active' : '' }}">
                    <div class="br-menu-item">
                        <i class="menu-item-icon icon ion-ios-paperplane-outline tx-22"></i>
                        <span class="menu-item-label">{{ ucfirst($menu_function->name) }}</span>
                    </div><!-- menu-item -->
                </a><!-- br-menu-link -->
            @endforeach @endif

            <label class="sidebar-label pd-x-15 mg-t-20">@lang('global.managers')</label>
            @if( isset($menu_managers)) @foreach($menu_managers as $menu_manager)
                <a href="/admin/{{$menu_manager->name}}" class="br-menu-link {{ request()->is("*$menu_manager->name*") ? 'active' : '' }}">
                    <div class="br-menu-item">
                        <i class="menu-item-icon icon ion-ios-paw-outline tx-22"></i>
                        <span class="menu-item-label">{{ ucfirst($menu_manager->name) }}</span>
                    </div><!-- menu-item -->
                </a><!-- br-menu-link -->
            @endforeach @endif

            <label class="sidebar-label pd-x-15 mg-t-20">@lang('global.plugins')</label>
            @if( isset($menu_plugins)) @foreach($menu_plugins as $menu_plugin)
                <a href="/admin/{{$menu_plugin->name}}" class="br-menu-link {{ request()->is("*$menu_plugin->name*") ? 'active' : '' }}">
                    <div class="br-menu-item">
                        <i class="menu-item-icon icon ion-ios-briefcase-outline tx-22"></i>
                        <span class="menu-item-label">{{ ucfirst($menu_plugin->name) }}</span>
                    </div><!-- menu-item -->
                </a><!-- br-menu-link -->
            @endforeach @endif
        </div><!-- br-sideleft-menu -->

        <label class="sidebar-label pd-x-15 mg-t-25 mg-b-20 ">@lang('global.information_sumary')</label>

        <div class="info-list" style="bottom: 0px;">
            <div class="d-flex align-items-center justify-content-between pd-x-15">
                <div>
                    <p class="tx-10 tx-roboto tx-uppercase tx-spacing-1 tx-white op-3 mg-b-2 space-nowrap">@lang('global.memory_usage')</p>
                    <h5 class="tx-lato tx-white tx-normal mg-b-0">32.3%</h5>
                </div>
                <span class="peity-bar" data-peity='{ "fill": ["#336490"], "height": 35, "width": 60 }'>8,6,5,9,8,4,9,3,5,9</span>
            </div><!-- d-flex -->

            <div class="d-flex align-items-center justify-content-between pd-x-15 mg-t-20">
                <div>
                    <p class="tx-10 tx-roboto tx-uppercase tx-spacing-1 tx-white op-3 mg-b-2 space-nowrap">@lang('global.cpu_usage')</p>
                    <h5 class="tx-lato tx-white tx-normal mg-b-0">140.05</h5>
                </div>
                <span class="peity-bar" data-peity='{ "fill": ["#1C7973"], "height": 35, "width": 60 }'>4,3,5,7,12,10,4,5,11,7</span>
            </div><!-- d-flex -->

            <div class="d-flex align-items-center justify-content-between pd-x-15 mg-t-20">
                <div>
                    <p class="tx-10 tx-roboto tx-uppercase tx-spacing-1 tx-white op-3 mg-b-2 space-nowrap">@lang('global.disk_usage')</p>
                    <h5 class="tx-lato tx-white tx-normal mg-b-0">82.02%</h5>
                </div>
                <span class="peity-bar" data-peity='{ "fill": ["#8E4246"], "height": 35, "width": 60 }'>1,2,1,3,2,10,4,12,7</span>
            </div><!-- d-flex -->

            <div class="d-flex align-items-center justify-content-between pd-x-15 mg-t-20">
                <div>
                    <p class="tx-10 tx-roboto tx-uppercase tx-spacing-1 tx-white op-3 mg-b-2 space-nowrap">@lang('global.daily_traffic')</p>
                    <h5 class="tx-lato tx-white tx-normal mg-b-0">62,201</h5>
                </div>
                <span class="peity-bar" data-peity='{ "fill": ["#9C7846"], "height": 35, "width": 60 }'>3,12,7,9,2,3,4,5,2</span>
            </div><!-- d-flex -->
        </div><!-- info-lst -->

        <br>
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    @include('layout::backend.nav')

    @include('layout::backend.contact')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="{{ route('layout.index') }}">@lang('global.dashboard')</a>
                {{--<span class="breadcrumb-item active">Blank Page</span>--}}

                @yield('breadcrumb')
            </nav>
        </div><!-- br-pageheader -->

        @yield('pageheader')

        <div class="br-pagebody">

            <!-- start you own content here -->
            @yield('content')
        </div><!-- br-pagebody -->

        <footer class="br-footer">
            <div class="footer-left">
                <div class="mg-b-2">Copyright &copy; 2018. {{ env('APP_NAME')  }}.</div>
                <div>@author ThanhTung</div>
            </div>
            {{--<div class="footer-right d-flex align-items-center">--}}
            {{--<span class="tx-uppercase mg-r-10">Share:</span>--}}
            {{--<a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/bracket/intro"><i class="fa fa-facebook tx-20"></i></a>--}}
            {{--<a target="_blank" class="pd-x-5" href="https://twitter.com/home?status=Bracket,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/bracket/intro"><i class="fa fa-twitter tx-20"></i></a>--}}
            {{--</div>--}}
        </footer>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    @include('layout::backend.script')

    @yield('script')
</body>
</html>
