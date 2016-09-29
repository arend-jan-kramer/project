@extends('layout.template1')

@section('title')
	Bestellen
@endsection

@section('title_content')
	<h2>Bestel menu</h2>
@endsection

@section('body')
	<p class="alert-danger">{{ Session::get('message') }}</p>
	<p><a class="text-success" href="">Nieuw</a></p>
	<table class="table table-inverse table-bordered table-hover">
		<thead class="thead-inverse">
			<th>#</th>
			<th>Naam</th>
			<th>Description</th>
			<th>Prijs</th>
			<th>Optie</th>
		</thead>
		<tbody>
		<?php $count = 0; ?>
		@foreach($bestel_menus as $bestel_menu)
			<tr>
				<td>{{ ++$count }}</td>
				<td>{{ $bestel_menu->order_name }}</td>
				<td>{{ $bestel_menu->description }}</td>
				<td>€ {{ $bestel_menu->price }}</td>
				<td>
					<a href="{{ 'editbestelmenu/'.$bestel_menu->id }}">Update</a> |
					<a href="">Verwijderen</a>
				</td>
			</tr>
		@endforeach
		</tbody>
@endsection