@extends('layout.template1')

@section('title')
	Reserveren
@endsection

@section('title_content')
	<h2>Reservering aanmaken</h2>
@endsection

@section('body')
	{!! Form::open(array('route' => 'reserveren.store')) !!}
		{{ Form::label('customers_ID', 'Klant naam') }}
		{{ Form::text('customers_id', null, array('class' => 'form-control')) }}
		{{ Form::submit('Reserveren', array('class' => 'btn btn-succes')) }}
	{!! Form::close() !!}
@endsection