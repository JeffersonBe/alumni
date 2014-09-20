<html>
  <head>
    {{ HTML::style('assets/css/styles.css') }}
    {{ HTML::style('assets/css/plugins.css') }}
  </head>
  <body>
      @include('navigation')
    <div class="container">
        @yield('content')
    </div>
    {{ HTML::script('assets/js/jquery.js') }}
    {{ HTML::script('assets/js/plugins.js') }}
    {{ HTML::script('assets/js/bootstrap.js') }}
  </body>
</html>
