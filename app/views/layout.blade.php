<html>
  <head>
    {{ HTML::style('assets/css/plugins.css') }}
    {{ HTML::style('assets/css/styles.css') }}
  </head>
  <body>
    @include('navigation')
    <div class="container">
        @yield('content')
    </div>

    {{ HTML::script('assets/js/jquery.js') }}
    {{ HTML::script('assets/js/scripts.js') }}
    {{ HTML::script('assets/js/bootstrap.js') }}
    {{ HTML::script('assets/js/plugins.js') }}
  </body>
</html>
