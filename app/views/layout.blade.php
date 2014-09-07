<html>
  <head>
    {{ HTML::style('assets/css/styles.css') }}
    {{ HTML::style('assets/css/plugins.css') }}
    {{ HTML::script('assets/js/plugins.js') }}
  </head>
  <body>
      @include('navigation')
    <div class="container">
        @yield('content')
    </div>
  {{ HTML::script('assets/js/bootstrap.js') }}
  </body>
</html>
