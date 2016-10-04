@extends('layout.template1')

@section('title')
	Overzicht / zoeken
@endsection

@section('title_content')
	<h2>Overzicht</h2>
@endsection

@section('body')
	<p class="alert-danger">{{ Session::get('message') }}</p>
	<form action="{{ action('overzichtController@zoeken')}}" method="post">
		<input type="text" name="search">
		<button type="submit"  class="btn btn-warning" id="getRequest">getRequest</button>
		<input type="hidden" name="_token" value="{{Session::token()}}">
	</form>
	<div id="getRequestData">
	</div>

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
			@foreach($reservations as $reservation)
				<tr>
					<td>{{ $reservation->id }}</td>
					<td>{{ $reservation->customers_id }}</td>
					<td>{{ $reservation->table_id }}</td>
					<td>{{ $reservation->table_date_time }}</td>
					<td>{{ $reservation->x_people }}</td>
					<td>
						<a href="{{ 'editereservation/'.$reservation->id }}">Update</a> |
						<a href="{{ 'verwijderenreservation/'.$reservation->id }}">Verwijderen</a>
					</td>
				</tr>
			@endforeach
			{{-- Display next and prev --}}
				{{ $reservations->render()}}
		</tbody>
	</table>
@endsection