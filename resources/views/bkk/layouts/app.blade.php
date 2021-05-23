
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="{{ asset('sb_admin/css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('sb_admin/vendors/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('sb_admin/vendors/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="{{ asset('sb_admin/assets/img/favicon.png') }}" />
        <link rel="stylesheet" href="{{ asset('sb_admin/vendors/fontawesome-free/css/all.min.css') }}" />
        <script src="{{ asset('sb_admin/vendors/feather-icons/feather.min.js') }}"></script>

        @stack('css')
    </head>
    <body class="nav-fixed">

        @include('bkk.layouts.topbar')

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('bkk.layouts.sidebar')
            </div>
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>
                <footer class="footer mt-auto footer-light">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 small">Copyright &#xA9; Your Website 2021</div>
                            <div class="col-md-6 text-md-right small">
                                <a href="#!">Privacy Policy</a>
                                &#xB7;
                                <a href="#!">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="{{ asset('sb_admin/vendors/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('sb_admin/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('sb_admin/js/scripts.js') }}"></script>
        <script src="{{ asset('sb_admin/vendors/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('sb_admin/assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('sb_admin/assets/demo/chart-bar-demo.js') }}"></script>
        <script src="{{ asset('sb_admin/vendors/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('sb_admin/vendors/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('sb_admin/assets/demo/datatables-demo.js') }}"></script>
        <script src="{{ asset('sb_admin/vendors/moment/moment.min.js') }}"></script>
        <script src="{{ asset('sb_admin/vendors/daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ asset('sb_admin/assets/demo/date-range-picker-demo.js') }}"></script>
        @stack('js')
    </body>
</html>
