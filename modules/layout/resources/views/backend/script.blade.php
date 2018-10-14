<script src="{{ asset('bower_components/jquery/dist/jquery.js') }}"></script>
<script src="{{ asset('bower_components/popper.js/dist/umd/popper.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.js')}}"></script>
<script src="{{ asset('bower_components/moment/moment.js') }}"></script>
<script src="{{ asset('bower_components/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{ asset('bower_components/jquery-switchbutton/jquery.switchButton.js') }}"></script>
<script src="{{ asset('bower_components/peity/jquery.peity.min.js') }}"></script>
<script src="{{ asset('bower_components/jquery.sparkline.bower/dist/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('bower_components/d3/d3.js') }}"></script>
<script src="{{ asset('bower_components/chart.js/dist/Chart.js') }}"></script>

<script src="{{ mix('build/js/global.js') }}"></script>
<script src="{{ mix('build/js/ResizeSensor.js') }}"></script>
<script src="{{ mix('build/js/dashboard.js') }}"></script>

<script>
    $(function(){
        'use strict'

        // FOR DEMO ONLY
        // menu collapsed by default during first page load or refresh with screen
        // having a size between 992px and 1299px. This is intended on this page only
        // for better viewing of widgets demo.
        $(window).resize(function(){
            minimizeMenu();
        });

        minimizeMenu();

        function minimizeMenu() {
            if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
                // show only the icons and hide left menu label by default
                $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
                $('body').addClass('collapsed-menu');
                $('.show-sub + .br-menu-sub').slideUp();
            } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
                $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
                $('body').removeClass('collapsed-menu');
                $('.show-sub + .br-menu-sub').slideDown();
            }
        }
    });

    $("span.peity-bar").peity('bar');
    $("span.peity-donut").peity('donut');
</script>
