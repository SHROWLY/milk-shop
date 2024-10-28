<!DOCTYPE html>
<html lang="en">

    <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0,target-densitydpi=device-dpi, user-scalable=no" />
        <title>Masroor|Login</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="/assets/css/form-elements.css">
        <link rel="stylesheet" href="/assets/css/style.css">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="/sitesmall.png" />
        <!-- Scripts -->
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>

    </head>

    <body style="background-color: #2A3F54;">

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg" style="padding-bottom: 0; padding-top: 10px;">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1>Login</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box" style="    margin-top: 10px;">
                        	<div class="form-top" style="padding-bottom: 0;">
                                <h3 style="text-align: center; margin-top: 15px; margin-bottom: 20px;"><img src="/site_logo.png" style="width: 120px;"></h3>
                            </div>
                            <div class="form-bottom">
			                     <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}
			                    	<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}" style="margin-left: 0; margin-right: 0;">
                                        <h5>Username:</h5>
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text" name="username" value="{{ old('username') }}" placeholder="Username" class="form-username form-control" id="form-username" required="required">
                                        @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
			                        </div>
			                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" style="margin-left: 0; margin-right: 0;">
			                        	<label class="sr-only" for="form-password">Password</label>
                                        <h5>Password:</h5>
			                        	<input type="password" name="password" placeholder="Password" class="form-password form-control" id="form-password" required="required">
                                        @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
			                        </div>
			                        <button type="submit" class="btn">Log In</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="/assets/js/jquery-1.11.1.min.js"></script>
        <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
 
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>
