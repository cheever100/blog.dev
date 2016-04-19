@extends('layouts.master')
@section('content')

<h1>{{{ $post->title }}}</h1>

<p>{{{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}}</p>

<p>Written by: {{{ $post->user->first_name }}}</p>

<p>{{{ $post->body }}}<p>


@stop
