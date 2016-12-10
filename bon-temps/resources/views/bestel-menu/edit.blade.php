@extends('layout.bon-temps')

@section('title')
	Update Bestel menu
@endsection

@section('title_content')
	<h2>Aanpassen</h2>
@endsection

@section('inner_wrapper')
	{!! Form::model($bestelmenus, ['route' => ['bestel-menu.update', $bestelmenus->id], 'method' => 'PUT']) !!}
		<div class="form-group">
		{{ Form::text('order_name', null, array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
		{{ Form::checkbox('zichtbaar', $bestelmenus->visible , $bestelmenus->visible) }}
		{{ Form::label('', 'zichtbaar') }}
		</div>
		<div class="form-group">
		{{ Form::textarea('description', null, array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
		{{ Form::text('price', null, array('class' => 'form-control')) }}
		</div>
		{{-- <div class="form-group">
		{!! Form::file('image') !!}
		</div> --}}
		<div class="form-group">
		{{ Form::submit('Opslaan aanpassingen', ['class' => 'btn btn-block']) }}
		{!! Html::linkRoute('bestel-menu.show', 'Annuleren', array($bestelmenus->id), array('class' => ' btn btn-block')) !!}
		</div>
	{!! Form::close() !!}
@endsection