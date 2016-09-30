@extends('layout.template1')

@section('title')
	Reserveren
@endsection

@section('title_content')
	<h2>Reserveren</h2>
@endsection

@section('body')
	<p class="success">{{ Session::get('message') }}</p>
	@if (count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error}}</li>
			@endforeach
		</ul>
	</div>
	@endif
	
	<div id="getRequestData">
	</div>

	<form class="form-horizontal" role="form" action="{{ action('dataController@save') }}" method="post">
		<div class="modal-header">
			<h3>Reserveren</h3>
		</div>
		<div class="modal-body">
			<div class="col-sm-6">
				@foreach( $velden as $veld)
				<div class="form-group">
					<label class='col-sm-3'>{{ $veld }}</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="{{ $veld }}">
					</div>
				</div>
				@endforeach
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label class="col-sm-3" for="datum">Datum:</label>
					<div class="col-sm-9">
						{{ Form::text('date', '', array('id' => 'datepicker', 'name' => 'datum', 'class' => 'form-control')) }}
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3" for="tijdstip">Tijdstip:</label>
					<div class="col-sm-4">
					<label class="" for="uur">Uur</label>
						<select class="selectpicker form-control" name="tijdstipu" data-live-search="true" data-style="btn-primary" title="Kies uw menu" data-width="100%">
							<option value='08'>08</option>
							<option value='09'>09</option>
							<option value='10'>10</option>
							<option value='11'>11</option>
							<option value='12'>12</option>
							<option value='13'>13</option>
							<option value='13'>14</option>
							<option value='13'>15</option>
							<option value='13'>16</option>
							<option value='13'>17</option>
						</select>
					</div>
					<div class="col-sm-4">
					<label class="" for="uur">Min</label>
						<select class="selectpicker form-control" name="tijdstipm" data-live-search="true" data-style="btn-primary" title="Kies uw menu" data-width="100%">
							<option value='00'>00</option>
							<option value='10'>10</option>
							<option value='20'>20</option>
							<option value='30'>30</option>
							<option value='40'>40</option>
							<option value='50'>50</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3" for="aantal">Aantal:</label>
					<div class="col-sm-9">
						<input type="number" value="1" name="aantal" class="aantal form-control" id="-aantal" min="1">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3" for="menu">Menu:</label>
					<div class="col-sm-9">
						<select class="selectpicker form-control" id="menuitems" data-live-search="true" data-style="btn-primary" title="Kies uw menu" data-width="100%">
							@foreach($orderlists as $orderlist)
								<option value='{{$orderlist->id}}'>{{$orderlist->order_name.' € '.$orderlist->price}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer col-sm-12">
	    	<a class="btn btn-default" data-dismiss="modal">Reset</a>
	    	<input id="submit" name="submit" type="submit" value="Reserveren" class="btn btn-success">
	    	<input type="hidden" name="_token" value="{{Session::token()}}">
		</div>
	</form>
</div>
@endsection