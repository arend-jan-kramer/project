@extends('layout.bon-temps')

@section('title')
	Reserveren
@endsection

@section('title_content')
	<h2>Reservering aanmaken</h2>
@endsection

@section('body')
	{!! Form::open(array('route' => 'reserveren.store', 'data-parsley-validate' => '')) !!}
	<div class="modal-body">
		<div class="col-sm-6">
			<div class="form-group">
				{{ Form::label(null, 'Naam') }}
				{{ Form::text('name', null, array('class' => 'form-control', 'id' =>'klant_naam', 'required' => '')) }}
			</div>
			
			<div class="form-group">
				{{ Form::label('address', 'Adres:') }}
				{{ Form::text('address', null, array('class' => 'form-control')) }}
			</div>

			<div class="form-group">
				{{ Form::label('city', 'Woonplaats') }}
				{{ Form::text('city', null, array('class' => 'form-control')) }}
			</div>

			<div class="form-group">
				{{ Form::label('email', 'Email') }}
				{{ Form::email('email', null, array('class' => 'form-control', 'required' => '')) }}
			</div>

			<div class="form-group">
				{{ Form::label('phone', 'Telefoon nummer') }}
				{{ Form::text('phone_number', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '10', 'minlength' => '10')) }}
			</div>
			<div class="form-group">
				{{ Form::label(null, 'Aantal personen') }}
				{{ Form::number('x_people', '1', array('class' => 'form-control', 'min' => 1, 'max' => 80)) }}
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				{{ Form::label(null, 'Datum en Tijd') }}
				{{ Form::text('date', $nowTime, array('id' => 'datepicker', 'class' => 'form-control')) }}
				{{ Form::hidden('tabl_nr', $table_id, array('id' => 'invisible_id')) }}
			</div>
			<div class="form-group">
				<label>Selecteer menu</label>
				<select name="key" id="menulist" class="form-control">
					<option value="" disabled selected>Kies menu</option>
					@foreach($orderlists as $menu)
						<option value="{{ $menu->id }}">{{ $menu->order_name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>menu naam</label>
				{{ Form::text('menu_name', null, array('id' => 'menu-name', 'class' => 'form-control','readonly' => '')) }}
			</div>
			<div class="form-group">
				<label>menu omschrijving</label>
				{{ Form::text('description', null, array('id' => 'menu-description', 'class' => 'form-control','readonly' => '')) }}
			</div>
			<div class="form-group">
				<label>menu prijs</label>
				{{ Form::text('price', null, array('id' => 'menu-price', 'class' => 'form-control','readonly' => '')) }}
			</div>
		</div>
	</div>
	<div class="modal-footer col-sm-12">
		{{ Form::submit('Reserveren', array('class' => 'btn btn-success')) }}
	</div>
	{!! Form::close() !!}
@endsection
@section('scripts')
	
	<script>
		$('#menulist').on('change', function(e){
			var menu_id = e.target.value;
			//ajax
			$.get('get_menu?key='+menu_id, function(data){
				//success
				data = data[0];
				$('#menu-price').val(data.price);
				$('#menu-description').val(data.description);
				$('#menu-name').val(data.order_name);
			});
		});
	</script>
@endsection