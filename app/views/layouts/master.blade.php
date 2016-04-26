<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="/css/blog.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
</head>

<body>
	<div class="container">
    	@yield('top-script')
	</div>
	
	@yield('content')

    @if (Session::has('successMessage'))
    	<div class="alert alert-success">
    		{{{ Session::get('successMessage') }}}
    	</div>
	@endif

	@if (Session::has('errorMessage'))
	    <div class="alert alert-danger">
	    	{{{ Session::get('errorMessage') }}}
	    </div>
	@endif
	
    @yield('bottom-script')     
    <h1><img src="/img/theater.gif" width="150"
	height="100"></h1>

	<h3><a href="{{{ action('PostsController@index') }}}">Return to home page</a></h3>

	<h3><a href="{{{ action('UserController@logout') }}}">Logout
	</a></h3>
	
	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="https://maxcdn.js/bootstrapcdn.com/bootstrap/3.3.6/js">
	</script>
	
</body>
</html>
