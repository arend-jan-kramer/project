<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow" />
	<title>@yield('title') | Bon temp's</title> <!-- Title aanpassen voor elke pagina -->
	{!! Html::style('css/style.css') !!}
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Latest compiled and minified CSS -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css"> --}}
    
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
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
				@yield('body')
			</div>
		</div>
	</div>
	<footer class="navbar navbar-inverse navbar-fixed-bottom">
		<div class="container">
			<p class="navbar-text text-center col-md-12 col-sm-12 col-xs-12">&copy; Copyright {{ (date('Y') == '2016')? date('Y'): '2016 -'. date('Y') }} | Hoornbeeck College | Mediadevelopment</p>
		</div>
	</footer>
    <!-- Latest compiled and minified CSS -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css"> --}}

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/i18n/defaults-*.min.js"></script>
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    {!! Html::script('js/scripts.js') !!}
</body>
</html>