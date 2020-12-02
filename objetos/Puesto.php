<?php
	// Antonio J.Sánchez
	// Desarrollo Web en Entorno Servidor
	// curso 2020|21

	require_once "libs/Database.php" ;

	class Puesto
	{
		private int $idPue ;
		private string $nombre ;
		private string $ubicacion ;
		private $planta ;
		private $numero ;

	    /**
	     * @return mixed
	     */
	    public function getIdPue()
	    {
	        return $this->idPue;
	    }

	    /**
	     * @return mixed
	     */
	    public function getNombre()
	    {
	        return $this->nombre;
	    }

	    /**
	     * @param mixed $nombre
	     *
	     * @return self
	     */
	    public function setNombre($nombre)
	    {
	        $this->nombre = $nombre;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getUbicacion()
	    {
	        return $this->ubicacion;
	    }

	    /**
	     * @param mixed $ubicacion
	     *
	     * @return self
	     */
	    public function setUbicacion($ubicacion)
	    {
	        $this->ubicacion = $ubicacion;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getPlanta()
	    {
	        return $this->planta;
	    }

	    /**
	     * @param mixed $planta
	     *
	     * @return self
	     */
	    public function setPlanta($planta)
	    {
	        $this->planta = ($planta)?$planta:0 ;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getNumero()
	    {
	        return $this->numero;
	    }

	    /**
	     * @param mixed $numero
	     *
	     * @return self
	     */
	    public function setNumero($numero)
	    {	    		    
	        $this->numero = ($numero)?$numero:0 ;

	        return $this;
	    }

	    /**
	     */
	    public function save()
	    {
	    	$db = Database::getDatabase() ;	    	
	    	$sql = "INSERT INTO puestos (nombre, ubicacion, planta, numero)
	    		    VALUES ('{$this->nombre}', '{$this->ubicacion}',
	    		    	     {$this->planta}, {$this->numero}) ;" ;
	    	//
	    	if ($db->consulta($sql)) $this->idPue = $db->getUltimoId() ;
	    	else
	    		die("Error: $sql") ;
	    }

	    /**
	    	@return 
	     */
	    public static function findAll():array
	    {
	    	$db = Database::getDatabase() ;
	    	$db->consulta("SELECT * FROM puestos ;") ;

	    	$datos = [] ;
	    	while ($puesto = $db->getObjeto("Puesto"))
	    		array_push($datos, $puesto) ;
	    	//
	    	return $datos ;
	    }

	     /**
	    	@return 
	     */
	    public static function findById(int $idp):?Puesto
	    {
	    	$db = Database::getDatabase() ;
	    	$db->consulta("SELECT * FROM puestos WHERE idPue = $idp ;") ;
	    	//
	    	return $db->getObjeto("Puesto") ;
	    }

	   
	    /**
	    	@return
	     */
	    public function __toString()
	    {
	    	return "Puesto   : {$this->nombre}<br/>
	    	        Ubicación: {$this->ubicacion}<br/>
	    	        Planta   : {$this->planta}<br/>
	    	        Número   : {$this->numero}<br/>" ;
	    }


}
