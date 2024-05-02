<?php
class db{    
    private $host    ="localhost";
    private $usuario ="root"; 
    private $passw   ="";
    private $db      ="artecele_elcomerc_i4961864_wp3";
    public $conexion;
    public function __construct(){
        $this->conexion = new mysqli($this->host, $this->usuario, $this->passw,$this->db) or die(mysql_error());
        $this->conexion->set_charset("utf8");
    }
	
	public function consultar($query){
		$datos = null;
		$numfilas = 0;
		
		try{
			$resultado = $this->conexion->query($query);
			if($resultado)
			$numfilas = $resultado->num_rows;
			
				for ($x=0;$x<$numfilas;$x++) 
				{
					$datos[$x] = $resultado->fetch_array();
				}
				return $datos;
		} catch(Exception $e){
			return $datos;
		}
		
		
    } 
}

?> 
