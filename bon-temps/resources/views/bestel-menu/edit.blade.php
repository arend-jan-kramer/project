@extends('layout.bon-temps')

@section('title')
	Update Bestel menu
@endsection

@section('title_content')
	<h2>Aanpassen</h2>
@endsection

@section('body')
	{!! Form::model($bestelmenus, ['route' => ['bestel-menu.update', $bestelmenus->id], 'method' => 'PUT']) !!}
		{{ Form::text('order_name', null, array('class' => 'form-control')) }}
		{{ Form::textarea('description', null, array('class' => 'form-control')) }}
		{{ Form::text('price', null, array('class' => 'form-control')) }}
		{{ Form::submit('Opslaan aanpassingen', ['class' => 'btn btn-block']) }}
		{!! Html::linkRoute('bestel-menu.show', 'Annuleren', array($bestelmenus->id), array('class' => ' btn btn-block')) !!}
	{!! Form::close() !!}
@endsection