@extends('layout.bon-temps')

@section('title')
	Overzicht
@endsection

@section('title_content')
	<h2>Reservering aanpassen</h2>
@endsection

@section('inner_wrapper')
	{!! Form::model($reservations, ['route' => ['overzicht.update', $reservations->id], 'method' => 'PUT' ]) !!}
		<div class="form-group">
			{{ Form::label(null, 'Naam') }}
			{{ Form::text('name', null, array('class' => 'form-control', 'disabled' => '')) }}
		</div>
		<div class="form-group">
			{{ Form::label(null, 'Aantal drank') }}
			{{ Form::input('text', 'x_drinks', null, array('class' => 'form-control', 'id' => 'aantal_glazen')) }}
		</div>
		<div class="form-group">
			{{ Form::label(null, 'Menu prijs') }}
			{{ Form::text('price', null, array('class' => 'form-control', 'id' => 'menuprijs', 'disabled' => '')) }}
		</div>
		<div class="form-group">
			{{ Form::label(null, 'Totaal') }}
			{{ Form::text('x_drinks_total', null, array('class' => 'form-control', 'id' => 'total_price', 'disabled' => '')) }}
		</div>
		<div class="form-group">
			{{ Form::input('button', 'add_drank', '+1 drank', array('class' => 'form-control btn btn-primary', 'id' => 'add_drank')) }}
		</div>
		<div class="form-group">
			{!! Html::linkRoute('overzicht.index', 'Annuleren', null, array('class' => 'form-control btn btn-warning','id' => 'add_drank_calc')) !!}
		</div>
		{{ Form::submit('Update', ['class' => 'btn btn-block btn-success']) }}
	{!! Form::close() !!}
@endsection

@section('scripts')
	<script>
		var menu_prijs = +$('#menuprijs').val();
		var aantal_glazen_besteld = +$('#aantal_glazen').val();
		var prijs_per_glas = +1.25;
		var sum;

		$('#add_drank').on('click', function(){
			aantal_glazen_besteld = ++aantal_glazen_besteld;
			$('#x_drinks').val(aantal_glazen_besteld);
			calculate();
		})
		function calculate(){
			sum = (prijs_per_glas * aantal_glazen_besteld + menu_prijs).toFixed(2);
			$('#total_price').val(sum);
			$('#aantal_glazen').val(aantal_glazen_besteld);
		}
		$(document).ready(function(){
			calculate();
		});
		
	</script>
@endsection