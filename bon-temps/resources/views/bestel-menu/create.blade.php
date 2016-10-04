@extends('layout.template1')

@section('title')
	Nieuw
@endsection

@section('title_content')
	<h2>Maak</h2>
@endsection

@section('body')
	{!! Form::open(array('route' => 'bestel-menu.store')) !!}
		{{ Form::label('title', 'Title:') }}
		{{ Form::text('title', null, array('class' => 'form-control') )}}

		{{ Form::label('description', 'Omschrijving menu:') }}
		{{ Form::textarea('description', null, array('class' => 'form-control')) }}

		{{ Form::label('price', 'Menu prijs:') }}
		{{ Form::text('form_price', null, array('class' => 'form-control')) }}

		{{ Form::submit('Create new menu', array('class' => 'btn btn-success btn-lg btn-block')) }}
	{!! Form::close() !!}
@endsection