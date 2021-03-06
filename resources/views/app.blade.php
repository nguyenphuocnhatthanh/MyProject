<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>Laravel</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/select2.min.css') }}" rel="stylesheet">
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Laravel</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}">Home</a></li>
                    @if(Auth::check())
                        <li class="dropdown"><a href="{{ url('admin/user') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" >User
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/admin/users">User</a></li>
                                <li><a href="/admin/role">Role</a></li>
                                <li><a href="/admin/permission">Permission</a></li>
                            </ul>
                        </li>
                    @endif
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>

					@else

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
    @if(Session::has('flash_notification') && Session::get('flash_notification') != null)
        @include('partials.flash')
    @endif

	@yield('content')

    @yield('scripts')
	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <script>
        $('document').ready(function () {
            $(document).on('click', '#checkAll', function () {
                $('.selectedCheck').prop('checked', this.checked);
            });
            $('.selectedCheck').click(function () {
                var checked = ($('.selectedCheck').filter(':checked').length == $('.selectedCheck').length);

                $('#checkAll').prop('checked', checked);
            });
        });
    </script>
    <script type="text/javascript" src="{{ asset('js/additional-methods.js')  }}"></script>
    <script type="text/javascript" src="{{ asset('js/additional-methods.min.js')  }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.validate.js')  }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.validate.min.js')  }}"></script>

</body>
</html>
