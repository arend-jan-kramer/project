@extends('layout.bon-temps')

@section('title')
	Overzicht
@endsection

@section('title_content')
	<h2>Bon temps <b>Reservering ID: {{$table->reservation_id}}</b></h2>
@endsection

@section('inner_wrapper')
<?php 
$menuStukPrice = $table->price;
$menuPrice = $table->price * $table->x_people;
$drinkenPrice = $table->x_drinks * 1.25;
$betalen = ($table->price * $table->x_people) + ($table->x_drinks * 1.25);
?>
<table class="table table-bordered table-sm">
	<thead>
		<tr>
			{{-- Kop titel --}}
			<th>Aantal</th>
			<th>Titel</th>
			<th>Omschrijving</th>
			<th>stuk prijs</th>
			<th>Prijs</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			{{-- Prijs voor het drinken --}}
			<td>{{$table->x_drinks}}</td>
			<td>Drinken</td>
			<td>Cola, Sinas, Koffie, Thee</td>
			<td>€ 1.25</td>
			<td>€ {{ $drinkenPrice }}</td>
		</tr>
		<tr>
			{{-- Geselecteerd menu --}}
			<td>{{$table->x_people }}</td>
			<td>{{$table->order_name}}</td>
			<td>{{$table->description}}</td>
			<td>€ {{ $menuStukPrice }}</td>
			<td>€ {{ $menuPrice }}</td>
		</tr>
	</tbody>
	<tfoot>
		<tr>
			{{-- Totaal prijs van de menu en drinken --}}
			<td></td>
			<td></td>
			<td></td>
			<td><b>Totaal<b></td>
			<td>€ {{ $betalen }}</td>
		</tr>
	</tfoot>
</table>
@endsection