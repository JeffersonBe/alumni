<html>
  <head>
    {{ HTML::style('assets/css/styles.css') }}
    {{ HTML::style('assets/css/plugins.css') }}
  </head>
  <body>
    <div class="container">
            {{ Form::open(array('url' => 'login', 'class' => 'form-signin')) }}
        		  <h2 class="form-signin-heading">Please sign in</h2>

            	<!-- if there are login errors, show them here -->

            	<p>
          			{{ $errors->first('email') }}
          			{{ $errors->first('password') }}
          		</p>

            	<p>
          			{{ Form::label('email', 'Email Address') }}
          			{{ Form::text('email', Input::old('email'),
                      array('placeholder' => 'awesome@awesome.com',
                            'class'       => 'form-control'
                            )) }}
          		</p>

            	<p>
          			{{ Form::label('password', 'Password') }}
          			{{ Form::password('password', array('class' => 'form-control')) }}
          		</p>

              <p>
                {{ Form::submit('Submit!', array('class'=> 'btn btn-lg btn-primary btn-block')) }}
              </p>

             {{ Form::close() }}
    </div>
    {{ HTML::script('assets/js/plugins.js') }}
    {{ HTML::script('assets/js/bootstrap.js') }}
  </body>
</html>
