@extends('layout.template1')

@section('title')
	Update Bestel menu
@endsection

@section('title_content')
	<h2>Aanpassen</h2>
@endsection

@section('body')
@if (count($errors) > 0)
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error}}</li>
		@endforeach
	</ul>
</div>
@endif

	<form action="{{ action('bestelmenuController@update') }}" method="post">
		<div class="panel panel-primary">
			<div class="panel-heading">Update</div>
			<div class="panel-body">
				<div class="panel panel-group">
					<label>Bestel naam:</label>
					<input type="hidden" name="id" value="{{ $row->id }}">
					<input type="text" name="naam" value="{{ $row->order_name }}" class="form-control">
				</div>
				<div class="panel panel-group">
					<label>Description</label>
					<input type="text" name="description" value="{{ $row->description }}" class="form-control">
				</div>
				<div class="panel panel-group">
					<label>Prijs</label>
					<input type="text" name="price" value="{{ $row->price }}" class="form-control">
				</div>
				<div class="panel panel-group">
					<label>Zichtbaar</label>
					<select name="visible" class="form-control">
						<option value='0'>niet</option>
						<option value='1'>wel</option>
					</select>
					<input type="hidden" id="visible_select" value="{{ $row->visible }}" class="form-control">
				</div>
				<input type="submit" value="Opslaan" class="btn btn-primary">
				<input type="hidden" name="_token" value="{{Session::token()}}">
			</div>
		</div>
	</form>
@endsection