@extends('layout.template1')

@section('title')
	Menu
@endsection

@section('title_content')
	<h2>Toon bestel menu {{ $bestelmenus->order_name }}</h2>
@endsection

@section('body')
	<p class="alert-danger">{{ Session::get('message') }}</p>
	<p>{!! Html::linkRoute('bestel-menu.create', 'Nieuw') !!}
	{!! Html::linkRoute('bestel-menu.index', 'Overzicht') !!}</p>

	<table class="table table-inverse table-bordered table-hover">
		<thead class="thead-inverse">
			<th>#</th>
			<th>Naam</th>
			<th>Description</th>
			<th>Prijs</th>
			<th>laatste aanpassing</th>
			<th>Optie</th>
		</thead>
		<tbody>
			<tr>
				<td>{{ $bestelmenus->id }}</td>
				<td>{{ $bestelmenus->order_name }}</td>
				<td>{{ $bestelmenus->description }}</td>
				<td>€ {{ $bestelmenus->price }}</td>
				<td>{{ date('l d F Y, h:m', strtotime($bestelmenus->updated_at)) }}</td>
				<td>
					{!! Html::linkRoute('bestel-menu.edit', 'Aanpassen', array($bestelmenus->id), array('class' => 'btn btn-success') ) !!}
					{!! Form::open(['route' => ['bestel-menu.destroy', $bestelmenus->id], 'method' => 'DELETE']) !!}
					{!! Form::submit('Verwijderen', array('class' => 'btn btn-danger')) !!}
					{!! Form::close() !!}
				</td>
			</tr>
		</tbody>
@endsection