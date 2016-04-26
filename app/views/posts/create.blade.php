@extends('layouts.master')

@section('top-script')
	<h1><strong>Create New Post</strong></h1>

@stop

@section('content')

  	{{ Form::open(['action' =>'PostsController@store', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => '_post-form']) }}

	<label>Title</label><br>
	{{ Form::textarea('title', null, ['placeholder' => '','cols' => '50', 'rows' => '2']) }}<br>
		
	<label>Content</label><br>
	{{ Form::textarea('body', null, ['placeholder' => '', 'cols' => '50', 'rows' => '10']) }}<br>
	
	<input type="submit" value="Save">

	</form>

@stop