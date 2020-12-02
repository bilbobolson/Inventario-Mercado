// Antonio J.Sánchez
// Desarrollo Web en Entorno Servidor
// curso 2020|21

$(document).ready(function()
{

	$("select").change(function(ev)
	{
		$("form").submit() ;
	}) ;

	$("input").keydown(function(ev)
	{
		var codigo = ev.which||ev.keyCode ;
		var campo  = $(this) ;

		// Si he pulsado el ENTER
		if (codigo==13)
		{
			// Guardo el valor del campo INPUT
			var valor = $(this).val() ;
			var item  = $(this).data("id") ;

			// Guardar el valor del campo INPUT
			// AJAX (Asynchronous JavaScript And XML)		
			$.ajax({
				url   : "operaciones.php",
				method: "GET",
				data  : { cop: 2, id: item, stock: valor },

			}).done(function(data)
			{
				$(campo).attr("type", "hidden")
						.prev()
						.html(valor)
						.toggle() ;
			}) ;
		}
	}) ;


	$(".st").click(function(ev)
	{		
		$(this).toggle()
			   .next()
			   .attr("type", "number") ;		
	}) ;
}) ;

