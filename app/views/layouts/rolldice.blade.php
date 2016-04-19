@extends('layouts.master')

@section('content')
	<h1>Roll Dice Game</h1>

	@if($rand == $guess)
		<h2>You Guessed Correctly</h2>

	@else
		<h2>You Guessed Wrong</h2>
		
	@endif

	<p>Rolled: {{{ $rand }}}</p>
	<p>Guess: {{{ $guess }}}</p>

@stop

@section('bottom-script')
		<script src="//code.jquery.com/jquery-1.11.3.
		min.js"></script>
		<script src="httos://maxcdn.bootstrapcdn.com/
		bootstrap/3.3.5/js/bootstrap.cim.js"></script>
@stop