<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
      <section>
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <h1 class="mt-5">{{ config('app.name', 'Laravel') }}</h1>
              <p>Search for a city to get the average temperature of the next 10 days</p>
            </div>
            <div class="col-lg-12">
              @yield('content')
            </div>
          </div>
        </div>
      </section>
    </div>
</body>
</html>
