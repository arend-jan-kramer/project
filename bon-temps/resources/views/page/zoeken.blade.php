@extends('layout.template1')

@section('title')
	Zoeken
@endsection

@section('title_content')
	<h2>Resultaat</h2>
@endsection

@section('body')
	<table class="table table-borderered table-hover">
		<thead>
			<th>#</th>
			<th>Reservatie naam</th>
			<th>Tafel nr.</th>
			<th>Datum | tijdstip</th>
			<th>Personen</th>
			<th>Uitvoeren</th>
		</thead>
		<tbody>
		<?php $count = 0; ?>
			@foreach($reservations as $reservation)
				<tr>
					<td>{{ ++$count }}</td>
					<td>{{ $reservation->name }}</td>
					<td>{{ $reservation->reservation_time }}</td>
					<td>{{ $reservation->table_date_time }}</td>
					<td>{{ $reservation->x_people }}</td>
					<td>
						<a href="{{ 'editereservation/'.$reservation->id }}">Update</a> |
						<a href="{{ 'verwijderenreservation/'.$reservation->id }}">Verwijderen</a>
					</td>
				</tr>
			@endforeach
		</tbody>
@endsection