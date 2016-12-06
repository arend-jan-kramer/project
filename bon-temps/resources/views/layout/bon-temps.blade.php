<!DOCTYPE html>
<html lang="nl">
<head>
	@include('partials._head')
</head>
@if(Route::getCurrentRoute()->uri() == '/')
<body class="home">
@else
<body>
@endif
@yield('wrapper')
	@if(Route::getCurrentRoute()->uri() != '/')
	<header>
		<nav class="navbar-inverse">	
			<div class="navbar container">	
				@include('partials._nav')
			</div>
		</nav>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="jumbotron">
						@yield('title_content')
					</div>
				</div>
			</div>
		</div>
	</header>
	@endif
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@include('partials._warning')
				@yield('inner_wrapper')
			</div>
		</div>
	</div>
	<footer class="navbar navbar-inverse navbar-fixed-bottom">
		@include('partials._footer')
	</footer>
	{{-- SCRIPTS --}}
	{!! Html::script('js/timepicker/timepicker-addons.js') !!}
	{!! Html::script('js/timepicker/acces.js') !!}
	{!! Html::script('js/scripts.js') !!}
    @yield('scripts')
</body>
</html>