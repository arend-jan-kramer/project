@extends('layout.template1')

@section('title')
	Nieuw bestel menu
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

	<form action="{{ action('bestelmenuController@save') }}" method="post">
		<div class="panel panel-primary">
			<div class="panel-heading">Update</div>
			<div class="panel-body">
				<div class="panel panel-group">
					<label>Bestel naam:</label>
					<input type="text" name="naam" class="form-control">
				</div>
				<div class="panel panel-group">
					<label>Description</label>
					<input type="text" name="description" class="form-control">
				</div>
				<div class="panel panel-group">
					<label>Prijs</label>
					<input type="text" name="price" class="form-control">
				</div>
				<input type="submit" value="Opslaan" class="btn btn-primary">
				<input type="hidden" name="_token" value="{{Session::token()}}">
			</div>
		</div>
	</form>
@endsection