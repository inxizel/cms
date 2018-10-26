<!doctype html>
<html lang="{{ \App::getLocale() }}">
<head>

    @include('layout::backend.head')

    @yield('style')
</head>
<body>
    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href="{{ route('layout.index') }}"><span>[</span>{{ env('APP_NAME') }}<span>]</span></a></div>
    <div class="br-sideleft overflow-y-auto">
        <div class="br-sideleft-menu">

            <label class="sidebar-label pd-x-15 mg-t-20">@lang('global.all')</label>
            <a href="{{ route('layout.index') }}" class="br-menu-link {{ request()->is('admin') ? 'active' : '' }}">
                <div class="br-menu-item">
                    <i class="fa fa-home tx-16" aria-hidden="true"></i>
                    <span class="menu-item-label">@lang('global.dashboard')</span>
                </div><!-- menu-item -->
            </a><!-- br-menu-link -->

            <label class="sidebar-label pd-x-15 mg-t-20">@lang('global.modules')</label>
            @if( isset($menu_functions)) @foreach($menu_functions as $menu_function)
                <a href="/admin/{{$menu_function->name}}" class="br-menu-link {{ request()->is("admin/$menu_function->name*") ? 'active' : '' }}">
                    <div class="br-menu-item">
                        <i class="fa fa-code tx-16" aria-hidden="true"></i>
                        <span class="menu-item-label">{{ ucfirst($menu_function->display_name) }}</span>
                    </div><!-- menu-item -->
                </a><!-- br-menu-link -->
            @endforeach @endif

            <label class="sidebar-label pd-x-15 mg-t-20">@lang('global.managers')</label>
            @if( isset($menu_managers)) @foreach($menu_managers as $menu_manager)
                <a href="/admin/{{$menu_manager->name}}" class="br-menu-link {{ request()->is("admin/$menu_manager->name*") ? 'active' : '' }}">
                    <div class="br-menu-item">
                        <i class="fa fa-folder tx-16" aria-hidden="true"></i>
                        <span class="menu-item-label">{{ ucfirst($menu_manager->display_name) }}</span>
                    </div><!-- menu-item -->
                </a><!-- br-menu-link -->
            @endforeach @endif

            <label class="sidebar-label pd-x-15 mg-t-20">@lang('global.plugins')</label>
            @if( isset($menu_plugins)) @foreach($menu_plugins as $menu_plugin)
                <a href="/admin/{{$menu_plugin->name}}" class="br-menu-link {{ request()->is("admin/$menu_plugin->name*") ? 'active' : '' }}">
                    <div class="br-menu-item">
                        <i class="fa fa-cog tx-16" aria-hidden="true"></i>
                        <span class="menu-item-label">{{ ucfirst($menu_plugin->display_name) }}</span>
                    </div><!-- menu-item -->
                </a><!-- br-menu-link -->
            @endforeach @endif
        </div><!-- br-sideleft-menu -->

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
            <div class="footer-right d-flex align-items-center">
            <span class="tx-uppercase mg-r-10">Share:</span>
            <a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/bracket/intro"><i class="fa fa-facebook tx-20"></i></a>
            <a target="_blank" class="pd-x-5" href="https://twitter.com/home?status=Bracket,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/bracket/intro"><i class="fa fa-twitter tx-20"></i></a>
            </div>
        </footer>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    @include('layout::backend.script')

    @yield('script')
</body>
</html>
