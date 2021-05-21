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

        <link href="{{ asset('sb_ui/css/styles.css') }}" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="{{ asset('sb_ui/assets/img/favicon.png') }}" />
        <script  src="{{ asset('sb_ui/vendor/cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js') }}" ></script>
        <script src="{{ asset('sb_ui/vendor/cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js') }}" ></script>

        @stack('css')
    </head>
    <body>
        <div id="layoutDefault">
            <div id="layoutDefault_content">
                <main>
                    <!-- Navbar-->
                    @include('layouts.navbar')

                    <!-- Content -->
                    @yield('content')

                </main>
            </div>

            <!-- Footer -->
            @include('layouts.footer')
        </div>
        <script src="{{ asset('sb_ui/vendor/code.jquery.com/jquery-3.5.1.min.js') }}" ></script>
        <script src="{{ asset('sb_ui/vendor/cdn.jsdelivr.net/npm/bootstrap%404.5.3/dist/js/bootstrap.bundle.min.js') }}" ></script>
        <script src="{{ asset('sb_ui/js/scripts.js') }}"></script>
        @stack('js')

    </body>

</html>
