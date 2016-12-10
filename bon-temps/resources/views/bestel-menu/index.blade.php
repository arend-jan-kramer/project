@extends('layout.bon-temps')

@section('title')
	Menu
@endsection

@section('title_content')
	<h2>Overzicht bestel menu</h2>
@endsection

@section('inner_wrapper')
	<p class="alert-danger">{{ Session::get('message') }}</p>
	<p>{!! Html::linkRoute('bestel-menu.create', 'Nieuw') !!}</p>

	<table class="table table-inverse table-bordered table-hover">
		<thead class="thead-inverse">
			<th>#</th>
			<th>Image</th>
			<th>Naam</th>
			<th>Omschrijving</th>
			<th>Prijs</th>
			<th>Status</th>
		</thead>
		<tbody>
		@foreach($bestelmenus as $bestel_menu)
			<tr>
				<td>{{ $bestel_menu->id }}</td>
				<td>{{ HTML::image($bestel_menu->image_url, '', array('class' => 'menu_image')) }}</td>
				<td>{{ $bestel_menu->order_name }}</td>
				<td>
					{{ substr($bestel_menu->description, 0 ,25 ) }}
					{{ strlen($bestel_menu->description) > 50 ? '...' : ''  }}
				</td>
				<td>{{ $bestel_menu->price }}</td>
				<td>
					{!! Html::linkRoute('bestel-menu.show', 'Toon', array($bestel_menu->id)) !!}
				</td>
			</tr>
		@endforeach
		</tbody>
@endsection