@extends('layouts.master')

@section('content')



{{ Form::open(['action' =>'UserController@doLogin', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => '_post-form']) }}

	{{ Form::label('email', 'email')}}
	{{ Form::text('email', null, ['placeholder' => 'Email']) }}<br>

	{{ Form::label('password', 'Password') }}
	{{ Form::text('password', null, ['placeholder' => 'Password']) }}<br>

{{ Form::submit('submit', ['class'=> 'btn btn-default']) }}

{{ Form::close() }}

@stop
