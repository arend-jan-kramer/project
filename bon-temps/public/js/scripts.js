$(document).ready(function(){
	$('#getRequest').click(function(){
		$.get('getRequest' ,function(data){
			$('#getRequestData').append(data);
			console.log(data);
		})
	});
});
$(document).ready(function(){
	$('#chechKlant').click(function(){
		$.get('checkKlant' ,function(data){
			$('#getRequestData').append(data);
			console.log(data);
		})
	});
});



  $(function() {
    $( "#datepicker" ).datepicker({
    	dateFormat: "dd-m-yy",
    	dayNamesMin: [ "Zo", "Ma", "Di", "Woe", "Don", "Vrij", "Za" ]
    });
  });
