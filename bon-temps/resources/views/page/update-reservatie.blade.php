@extends('layout.template1')

@section('title')
	Update reservering
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

	<form action="{{ action('dataController@save') }}" method="post">
		<div class="panel panel-primary">
			<div class="panel-heading">Update</div>
			<div class="panel-body">
				<div class="panel panel-group">
					<label>Naam</label>
					<input type="text" name="naam" class="form-control">
				</div>
				<div class="panel panel-group">
					<label>Adres</label>
					<input type="text" name="adres" class="form-control">
				</div>
				<div class="panel panel-group">
					<label>Plaats</label>
					<input type="text" name="city" class="form-control">
				</div>
				<div class="panel panel-group">
					<label>Email</label>
					<input type="text" name="email" class="form-control">
				</div>
				<div class="panel panel-group">
					<label>Telefoon nr</label>
					<input type="text" name="phone" class="form-control">
				</div>
				<input type="submit" value="Opslaan" class="btn btn-primary">
			</div>
		</div>
	</form>
@endsection