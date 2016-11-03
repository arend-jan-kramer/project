<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow" />
    <title>@yield('title') | Bon temp's</title> <!-- Title aanpassen voor elke pagina -->
    {!! Html::style('css/style.css') !!}
    {!! Html::script('js/jquery-1.10.2.js') !!}
    {!! Html::script('js/jquery-ui.js') !!}
    
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
    {!! Html::style('//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css') !!}
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    {!! Html::style('css/bootstrap/bootstrap.min.css') !!}
</head>
<body>
	<header>
		<nav class="navbar navbar-inverse">	
			<div class="container">	
				<ul class="nav navbar-nav title">
					<li><a href="/" class="title">Bon Temp's</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right"><li><a href="/"><span class="glyphicon glyphicon-log-in"></span> Back</a></li></ul>
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
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@include('partials._warning')
				@yield('body')
			</div>
		</div>
	</div>
	<footer class="navbar navbar-inverse navbar-fixed-bottom">
		<div class="container">
			<p class="navbar-text text-center col-md-12 col-sm-12 col-xs-12">&copy; Copyright {{ (date('Y') == '2016')? date('Y'): '2016 -'. date('Y') }} | Hoornbeeck College | Mediadevelopment</p>
		</div>
	</footer>
	{{-- SCRIPTS --}}
	{!! Html::script('js/timepicker/timepicker-addons.js') !!}
	{!! Html::script('js/timepicker/acces.js') !!}
	{!! Html::script('js/scripts.js') !!}
    @yield('scripts')
</body>
</html>