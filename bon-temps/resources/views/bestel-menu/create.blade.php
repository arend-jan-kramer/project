@extends('layout.bon-temps')

@section('title')
	Nieuw
@endsection

@section('title_content')
	<h2>Maak</h2>
@endsection

@section('body')
	{!! Form::open(array('route' => 'bestel-menu.store')) !!}
		<div class="form-group">
		{{ Form::label('title', 'Menu titel') }}
		{{ Form::text('title', null, array('class' => 'form-control') )}}
		</div>
		<div class="form-group">
		{{ Form::label('description', 'Menu') }}
		{{ Form::textarea('description', null, array('class' => 'form-control', 'id' => 'menukaart')) }}
		</div>
		<div class="form-group">
			<div id="result"></div>
		</div>
		<div class="form-group">
		{{ Form::label('price', 'Menu prijs') }}
		{{ Form::text('form_price', null, array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
		{{ Form::submit('Nieuw menu aanmaken', array('class' => 'btn btn-success btn-lg btn-block')) }}
		</div>
	{!! Form::close() !!}

@endsection
@section('scripts')
@endsection