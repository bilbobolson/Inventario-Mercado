<?php

	// Antonio J.Sánchez
	// Desarrollo Web en Entorno Servidor
	// curso 2020|21

	require_once "libs/Database.php" ;

	class Item
	{
		const int RPP = 5 ;

		private int $idIte ;
		private int $idPue ;
		private string $item ;
		private int $stock ;
		private string $alta ;
	
	    /**
	     * @return mixed
	     */
	    public function getIdIte()
	    {
	        return $this->idIte;
	    }

	    /**
	     * @param mixed $idIte
	     *
	     * @return self
	     */
	    public function setIdIte($idIte)
	    {
	        $this->idIte = $idIte;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getIdPue()
	    {
	        return $this->idPue;
	    }

	    /**
	     * @param mixed $idPue
	     *
	     * @return self
	     */
	    public function setIdPue($idPue)
	    {
	        $this->idPue = $idPue;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getItem()
	    {
	        return $this->item;
	    }

	    /**
	     * @param mixed $item
	     *
	     * @return self
	     */
	    public function setItem($item)
	    {
	        $this->item = $item;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getStock()
	    {
	        return $this->stock;
	    }

	    /**
	     * @param mixed $stock
	     *
	     * @return self
	     */
	    public function setStock($stock)
	    {
	        $this->stock = $stock;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getAlta()
	    {
	        return $this->alta;
	    }

	    /**
	     * @param mixed $alta
	     *
	     * @return self
	     */
	    public function setAlta($alta)
	    {
	        $this->alta = $alta;

	        return $this;
	    }

	    public function update()
	    {
	    	$db = Database::getDatabase() ;
	    	$db->consulta("UPDATE items SET stock = {$this->stock} WHERE idIte = {$this->idIte} ; ") ;
	    }

	    /**
	    	@param $idi
	    	@return
	     */
	    public static function findAll():array
	    {
	    	$db = Database::getDatabase() ;
	    	$db->consulta("SELECT * FROM items ;") ;

	    	$datos = [] ;
	    	while ($item = $db->getObjeto("Item"))
	    		array_push($datos, $item) ;
	    	//
	    	return $datos ;
	    } 

	    /**
	    	@param $idi
	    	@return
	     */
	    public static function findById(int $idi):Item
	    {
	    	$db = Database::getDatabase() ;
	    	$db->consulta("SELECT * FROM items WHERE idIte = $idi ;") ;

	    	return $db->getObjeto("Item") ;
	    } 


	    /**
	    	@param $idp
	    	@return
	     */
	    public static function countAllByPuesto(int $idp)
	    {
	    	$db = Database::getDatabase() ;
	    	$db->consulta("SELECT COUNT(*) as total FROM items WHERE idPue = $idp ;") ;
	    	$obj = $db->getObjeto() ;

	    	return $obj->total ;

	    }

	    /**
	    	@param $idp 
	    	@param $pag 
	    	@param $reg 
	    	@return
	     */
	    public static function findAllByPuesto(int $idp, int $pag=0, int $reg = self::RPP):array
	    {
	    
	    	$offset = ($pag - 1) * $reg ;

	    	$db = Database::getDatabase() ;
	    	$db->consulta("SELECT *, DATE_FORMAT(alta,'%d/%m/%Y') as alta FROM items WHERE idPue = $idp 
	    		LIMIT $offset,$reg ;") ;

	    	$datos = [] ;
	    	while ($item = $db->getObjeto("Item"))
	    		array_push($datos, $item) ;
	    	//
	    	return $datos ;
	    }
}
