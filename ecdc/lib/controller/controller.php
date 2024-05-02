<?php
error_reporting(1);
//error_reporting(0);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'DAO.php';
include ('../../smarty/libs/Smarty.class.php');

class controlller {
	
	private $conexion;
	
	 public function __construct(){
        $this->conexion = new DAO();
    }
	
	
	public function buscarData ()
	{
		
	 $resultado = $this->conexion->buscarData();
	 return $resultado;
	 
	}
	
	public function buscarTiendaXFiltro ($filtroProducto, $filtroCategoria, $filtroMarca, $filtroCcomercial, $orderByPrecio)
	{
		
	 $resultado = $this->conexion->buscarTiendaXFiltro($filtroProducto, $filtroCategoria, $filtroMarca, $filtroCcomercial, $orderByPrecio);
	 return $resultado;
	 
	}
	
	public function cargarCombo ($query=null)
	{	
		
		$combo = $this->conexion->cargarCombo($query);
		return $combo;
	}
	
	
	public function cargarComboCentrosC()
	{	
		$resultado = $this->conexion->cargarComboCentrosC();
		return $resultado;
	}
	
	public function cargarComboMarca()
	{	
		$resultado = $this->conexion->cargarComboMarca();
		return $resultado;
	}
	
	//Esta funcion devuelve todas las tiendas encontradas
	public function mostrarTiendasXfiltro ($filtroProducto, $filtroCategoria, $filtroMarca, $filtroCcomercial, $orderByPrecio)
	{
		$tiendas = $this->buscarTiendaXFiltro($filtroProducto, $filtroCategoria, $filtroMarca, $filtroCcomercial, $orderByPrecio);
		$html = $this->pintarTienda($tiendas);
		return $html; 
	}


	// esta funcion devuelve el html de cada tienda encontrada
	public function pintarTienda($tiendas)
	{
		$smarty = new Smarty;
		$smarty->assign("tiendas",$tiendas);	
		$htmlTiendas = $smarty->fetch('vistaTiendas.tpl');	
		return $htmlTiendas;
	}	

	public function cargarComboXparametro($parametro,$indFiltro)
	{
		$resultado = $this->conexion->cargarComboXparametro($parametro,$indFiltro);
		return $resultado;
	}

		public function GetData($tabla,$arrayParametros)
	{
		
		
		switch($tabla){
			
			case 'usuario':
			$resultado = $this->conexion->GetUsuario($tabla,$arrayParametros);
			break;
			
			default:
			$resultado = $this->conexion->GetData($tabla,$arrayParametros);
			break;
		}
		
		
		if($tabla == 'usuario'){
			$resultado = $this->conexion->GetUsuario($tabla,$arrayParametros);
		}else {
			$resultado = $this->conexion->GetData($tabla,$arrayParametros);
		}
		return $resultado;
	}
		
	}

									// Recibir peticion de filtro de comercios
									if (isset($_POST['producto']) or isset($_POST['categoria'])or isset($_POST['marca'])or isset($_POST['Ccomercial']))
									{
									//llamar la funcion que devuelve el html con las tiendas.
									$controller = new controlller();
									$tiendas = $controller->mostrarTiendasXfiltro($_POST['producto'], $_POST['categoria'], $_POST['marca'], $_POST['Ccomercial'], $_POST['orderByPrecio']);
									echo $tiendas;
									}

									// Recibir peticion para cargar filtro de marcas por categoria seleccionada
									
									if(isset($_POST['idCategoriaHtml']))
									{
										$controller = new controlller();
										$html = $controller->cargarComboXparametro($_POST['valueCategoria'],$_POST['idCategoriaHtml']);
										echo $html;	
									}










?>