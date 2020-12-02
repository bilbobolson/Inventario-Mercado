<!-- 
	Antonio J.Sánchez
	Desarrollo Web en Entorno Servidor
	curso 2020|21
-->

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inventario Mercado</title>
	<meta charset="utf8" />

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>

	<div class="container mt-4 mb-4">

		<div class="row">
			<div class="col">
				<h1>Inventario Mercados</h1>
			</div>

			<div class="col text-right">
				<a href="aniadir.php" class="btn btn-dark">Añadir puesto</a>
			</div>
		</div>

		<?php
			require_once "objetos/Puesto.php" ;
			$puestos = Puesto::findAll() ;

			//echo "<pre>".print_r($puestos,true)."</pre>" ;
		?>

		<table class="table">
			<thead>
				<tr>
					<th scope="col">Puesto</th>
					<th scope="col">Ubicación</th>
					<th scope="col"></th>				
				</tr>
			</thead>
			<tbody>
		<?php
			foreach($puestos as $item):
				echo "<tr>" ;
				echo "<td>{$item->getNombre()}</td>" ;
				echo "<td>{$item->getUbicacion()}</td>" ;
				echo "<td><a href=\"inventario.php?idp={$item->getIdPue()}\" class=\"btn btn-primary\">Inventario</a></td>" ;
				echo "</tr>" ;
			endforeach ;
		?>
			</tbody>
		</table>

		<div class="row">
			<div class="col text-center">
				<strong><?= count($puestos) ?> puestos</strong>
			</div>
		</div>

	</div>

</body>
</html>
