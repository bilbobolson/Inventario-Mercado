<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inventario Mercado</title>
	<meta charset="utf8" />

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>

	<div class="container mt-4 mb-4">

		<?php
			require_once "objetos/Puesto.php" ;
			require_once "objetos/Item.php" ;

			$pagina     = $_GET["pag"]??1 ;
			$registros  = $_GET["reg"]??Item::RPP ;	// registros por defecto 

			// buscamos el puesto
			$puesto     = Puesto::findById($_GET["idp"]) ;

			// obtenemos los ítems asociados al puesto
 			$items      = Item::findAllByPuesto($puesto->getIdPue(), $pagina, $registros) ;

 			// Calculamos el total de páginas que vamos a tener
 			$total  = ceil(Item::countAllByPuesto($puesto->getIdPue())/5) ;
		?>

		<div class="row">
			<div class="col">
				<h1>Inventario Mercados</h1>
				<h5><?= $puesto->getNombre() ?></h5>
			</div>

			<div class="col text-right">
				<a id="hm" href="#" class="btn btn-dark">Añadir producto</a>
			</div>

		</div>

		<div class="row">
			<div class="col">
				<form method="get">
					<input type="hidden" name="idp" value="<?= $_GET["idp"] ?>" />
					<select name="reg" class="form-control w-25">
						<option value="2">2 registros</option>
						<option value="3">3 registros</option>
						<option value="4">4 registros</option>
						<option value="5">5 registros</option>
					</select>
				</form>
			</div>

		</div>

		<?php
			if (empty($items)):
				echo "<div class=\"alert alert-info\">No se han encontrado registros</div>" ;
			else:
		?>

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
			<tbody>
		<?php
			foreach($items as $i => $item):
		?>
				<tr>
					<td><?= $i + 1 ?></td>
					<td><?= $item->getItem() ; ?></td>

					<!-- Stock -->
					<td>
						<span class="st" data-id="<?= $item->getIdIte() ?>"><?= $item->getStock() ; ?></span>
						<input type="hidden" value="<?= $item->getStock() ;?>"
							   class="form-control w-25" data-id="<?= $item->getIdIte() ; ?>" />
					</td>

					<td><?= $item->getAlta() ; ?></td>
					<td><a href="editar.php?idp=<?= $item->getIdIte() ; ?>" class="btn btn-primary">Editar</a></td>
					<td><a href="editar.php?idp=<?= $item->getIdIte() ; ?>" class="btn btn-primary">Borrar</a></td>
				</tr>
		<?php
			endforeach ;
		?>
			</tbody>
		</table>

		<!-- Paginación -->
		<?php

			// EJERCICIO: AÑADIR EL PARÁMETRO REG SI EXISTE
			$en_ant = ($pagina==1)?"#":"inventario.php?idp={$_GET["idp"]}&pag=".($pagina-1) ;
			$en_sig = ($pagina==$total)?"#":"inventario.php?idp={$_GET["idp"]}&pag=".($pagina+1) ;
		?>
		<a href="<?= $en_ant ?>">ant</a> |		
		<a href="<?= $en_sig ?>">sig</a>
		<?php
			endif ;
		?>

	</div>

</body>
</html>