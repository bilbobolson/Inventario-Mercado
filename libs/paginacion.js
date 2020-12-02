$(document).ready(function() 
{


	$.ajax({
		url    : "operaciones.php",
		method : "get",
		data   : { cop: 1 }
	})
	.done(function(data)
	{
		$("#contenido").html(data) ;
	});

}) ;