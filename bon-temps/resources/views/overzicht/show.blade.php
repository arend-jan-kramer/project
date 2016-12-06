@extends('layout.bon-temps')

@section('title')
	Overzicht
@endsection

@section('title_content')
	<h2>Reservering bekijken</h2>
@endsection

@section('inner_wrapper')
	<div class="row">
		<div class="col-sm-9">
			<ul>
				<li>Naam: {{ $reservations->customer->name }}</li>
				<li>e-mail: {{ $reservations->customer->email }}</li>
				<li>Tel: {{ $reservations->customer->phone_number }}</li>
			</ul>
			<hr>
			<ul>
				<li>Tafel nummer: {{ $reservations->table_id }}</li>
				<li>Datum: {{ date('d F Y', strtotime($reservations->table_date_time)) }}
				<li>Gereserveerd van af: {{ date('H:i', strtotime($reservations->table_date_time)) }}</li>
				<li>Gereserveerd tot: {{ date('H:i', strtotime($reservations->table_date_time)) }}</li>
			</ul>
			<hr>
			
		</div>

		{{-- <div class="col-sm-3">
			<div class="form-group">
				{!! Html::linkRoute('overzicht.index', 'Annuleren', null, array('class' => 'btn btn-success btn-block')) !!}
			</div>
			<div class="form-group">
				{!! Form::open(['route' => ['overzicht.destroy', $reservations->id], 'method' => 'DELETE']) !!}
				{!! Form::submit('Verwijderen', array('class' => 'btn btn-danger btn-block')) !!}
				{!! Form::close() !!}
			</div>
		</div> --}}
	</div>
@endsection