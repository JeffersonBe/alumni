<html>
  <head>
    {{ HTML::style('assets/css/styles.css') }}
    {{ HTML::style('assets/css/plugins.css') }}
  </head>
  <body>
    <div class="container">
        @yield('content')
    </div>
  </body>
</html>
