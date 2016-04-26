@extends('layouts.master')

@section('top-script')
@stop

@section('content')

<h1>{{{ $post->title }}}</h1>

<p>{{{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}}</p>

<p>Posted by: {{{ $post->user->first_name }}}</p>

<p>{{{ $post->body }}}<p>

@section('bottom-script')
{{-- @stop --}}

{{-- @yield('bottom-script') --}}
{{-- <h3><a href="{{{ action('PostsController@index', $post->id) }}}">Return to home page</a></h3>

<h3><a href="{{{ action('UserController@logout', $post->id) }}}">Logout</a></h3> --}}
@stop
