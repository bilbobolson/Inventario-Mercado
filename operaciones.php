<?php

	// Antonio J.Sánchez
	// Desarrollo Web en Entorno Servidor
	// curso 2020|21

	require_once "objetos/Item.php" ;
	
	// recuperamos los datos
	$valor = $_GET["stock"] ;
	$id    = $_GET["id"] ;

	// buscamos el ítem, establecemos el nuevo valor y actualizamos
	$item = Item::findById($id) ; 
	$item->setStock($valor) ;
	$item->update() ;	

	
