@extends('layouts.master')

@section('top-script')
	<h1><strong>Login</strong></h1>
@stop

@section('content')
<br>
{{ Form::open(['action' =>'UserController@doLogin', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => '_post-form']) }}
<br>
	{{ Form::label('email', 'Email')}}
	{{ Form::text('email', null, ['placeholder' => 'Email']) }}<br>
<br>
	{{ Form::label('password', 'Password') }}
	{{ Form::text('password', null, ['placeholder' => 'Password']) }}<br>
<br>
{{ Form::submit('Submit', ['class'=> 'btn btn-default']) }}
<br>
{{ Form::close() }}

@stop

