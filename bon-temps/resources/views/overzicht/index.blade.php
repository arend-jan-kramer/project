@extends('layout.bon-temps')

@section('title')
	Reserveringen
@endsection

@section('title_content')
	<h2>Overzicht</h2>
	<a href="/klanten" class="btn btn-primary" title="Overzicht met alle klanten">Download</a>
@endsection

@section('inner_wrapper')
	<p class="alert-danger">{{ Session::get('message') }}</p>
	<div class="form-group">
	{{ Form::text('keyword',null,array('class' => 'form-control', 'id' => 'search', 'placeholder' => 'Zoeken ...','autocomplete'=>'off')) }}
	</div>
	<table class="table table-inverse table-bordered table-hover">
		<thead class="thead-inverse">
			<th>#</th>
			<th>Klant naam</th>
			<th>Tafel nummer</th>
			<th>Datum</th>
			<th>Tijdstip</th>
			<th>Aantal personen</th>
			<th>Menu omschrijving</th>
			<th colspan="2" >Bestelling opnemen</th>
		</thead>
		<tbody id="searchresults">
		</tbody>
@endsection

@section('scripts')
	<script>
		function error_msg(){
			console.log('Er gaat iets fout in het json script!');
		}

		function overzicht(data){
			var html_str = '';
			var split_dateArray = new Array();
			var text;
			var tabel;
			for (var i = 0; i< data.length; i++){
				if(data[i].payed == 0){
					text = 'Afrekenen';
					table = '<td><a class="btn-success btn btn-xs btn-block" href="/overzicht/'+data[i].id+'/edit">ok</a>'+'</td><td>'
					+'<a class="print btn-warning btn btn-xs btn-block" href="/overzicht/'+data[i].id+'">'+text+'</a>'+'</td>';
				}else{
					text = 'Print';
					table = '<td colspan="2"><a class="print btn-warning btn btn-xs btn-block" href="/overzicht/'+data[i].id+'">'+text+'</a>'+'</td>';
				}
				split_dateArray = data[i].table_date_time.split(' ');
				html_str += '<tr><td>'
				+data[i].id+'</td><td>'
				+data[i].name+'</td><td>'
				+data[i].table_id+'</td><td>'
				+split_dateArray[0]+'</td><td>'
				+split_dateArray[1]+'</td><td>'
				+data[i].x_people+'</td><td>'
				+data[i].description+'</td>'
				+table;
			}
			html_str += '</tr>';
			$('#searchresults').html(html_str);
			
			$('a.print').on('click', function(){
				$(this).text('Print');
			});
		}
		$('#search').on('keyup', function (){
		    var keyword = $(this).val();
		    $.get('/search?keyword='+keyword, function(data){
		    	//success data
		    	overzicht(data);
		    });
		});

		$(document).ready(function(){
			var keyword = $(this).val();
			$.get('/search', function(data){
		    	//success data
		    	overzicht(data);
		    });
		});
	</script>
@endsection