<!DOCTYPE html>
<html>
<head>
	<title>Paginación vertical con AJAX</title>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<!-- JQuery -->
	<script src="libs/jquery-3.5.1.js"></script>
	<script src="libs/paginacion.js"></script>
</head>
<body>

	<?php

		require_once "objetos/Item.php" ;
		$datos = Item::findAll() ;

		//var_dump($datos) ;

	?>

	

	<div class="container">
		<table class="table mt-4">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Producto</th>
					<th scope="col">Stock</th>				
					<th scope="col">Alta</th>				
					<th scope="col"></th>				
				</tr>
			</thead>
			<tbody id="contenido">
				
			</tbody>
		</table>
	</div>

</body>
</html>