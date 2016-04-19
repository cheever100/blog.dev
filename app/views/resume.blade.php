@extends('layouts.master')

@section('top-script')
<link rel="stylesheet href="css/resume.js>
<title>My Resume</title>

@stop
@section('content')

<a href="http://blog.dev/">Home</a>
<a href="{{{ action('HomeController@showHome') }}}">Home</a>

<a href="/portfolio">Portfolio</a>
<a href="{{{ action('HomeController@showPortfolio') }}}">Portfolio</a>

<h1>My Resume</h1>
<h2>Experience</h2>

@stop
@section('bottom-script')
<script src="js/resume.js"></script>

@stop
