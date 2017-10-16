<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Managment</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @yield('styles')
    </head>
    <body>
         @include('_includes.nav.main')

        <div class="management-area" id="app">
          <div class="container">
            <div class="econtent">
              <div class="main">
              @yield('content')
              </div>
              <div class="side">
              @include('_includes.nav.manage')
              </div>
            </div>
          </div>
        </div>

        @include('_includes.footer.footer')

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('scripts')
    </body>
</html>
