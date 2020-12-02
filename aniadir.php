<?php

	if (!empty($_GET)):

		require_once "objetos/Puesto.php" ;

		$puesto = new Puesto() ;
		$puesto->setNombre($_GET["nom"]) ;
		$puesto->setUbicacion($_GET["ubi"]) ;
		$puesto->setPlanta($_GET["pla"]) ;
		$puesto->setNumero($_GET["num"]) ;
		$puesto->save() ;
		
		header("location:http://localhost/inventario") ;	
		die() ;
		
	endif ;

?>
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
		</div>

		<form id="cancel" action="index.php"></form>
		<form id="submit" action="aniadir.php" method="GET">

			<div class="row">
				<div class="col form-group">
					<label for="nom"><strong>Nombre del puesto:</strong></label>
					<input class="form-control" type="text" name="nom" id="nom" required />
				</div>
			</div>

			<div class="row">
				<div class="col form-group">
					<label for="ubi"><strong>Ubicación:</strong></label>
					<input class="form-control" type="text" name="ubi" id="ubi" required />
				</div>

				<div class="col form-group">
					<label for="pla"><strong>Planta:</strong></label>
					<input class="form-control" type="number" name="pla" id="pla" />
				</div>

				<div class="col form-group">
					<label for="num"><strong>Número:</strong></label>
					<input class="form-control" type="number" name="num" id="num" />
				</div>
			</div>

			<div class="row">
				<div class="col">
					<button form="submit" class="btn btn-primary">Guardar</button>	
					<button form="cancel" class="btn btn-danger">Cancelar</button>
				</div>
			</div>
		</form>
		

	</div>

</body>
</html>