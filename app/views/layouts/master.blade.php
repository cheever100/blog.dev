<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="css/bootstrap.css">
    @yield('top-script')

</head>
<body>

<main class="container">
    @if (Session::has('successMessage'))
    	<div class="alert alert-success">
    		{{{ Session::get('successMessage') }}}</div>
	@endif

	@if (Session::has('errorMessage'))
	    <div class="alert alert-danger">
	    	{{{ Session::get('errorMessage') }}}</div>
	@endif
	    
	@yield('content')

</main>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.js/bootstrapcdn.com/bootstrap/3.3.6/js"></script>
	@yield('bottom-script')
</body>
</html>
