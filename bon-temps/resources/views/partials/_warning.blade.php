@if (Session::has('success'))
	
	<div class="alert alert-success" role="alert">
		<strong>Succes:</strong> {{ Session::get('success') }}
	</div>

@endif

@if (Session::has('warning'))
	
	<div class="alert alert-warning" role="alert">
		<strong>Opgelet:</strong> {{ Session::get('warning') }}
	</div>

@endif

@if (count($errors) > 0)

	<div class="alert alert-danger" role="alert">
		<strong>Error(s):</strong>
		<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach  
		</ul>
	</div>

@endif