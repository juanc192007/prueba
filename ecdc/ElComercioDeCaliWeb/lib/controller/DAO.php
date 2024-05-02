<?php
include_once 'db.php';

class DAO {
	
	private $conexion;
	
	 public function __construct(){
        $this->conexion = new db();
    }
	
	
	
	/*
		consultar los comercios / tiendas registradas.
	*/
	public function buscarData ()
	{
		
	 $tiendas = $this->conexion->consultar('select * from tiendaccali where activa = 1 order by posicion asc');
	 $html='';
	 $numfilas = count($tiendas);
					for ($x=0;$x<$numfilas;$x++) 
					{
					 $html = $html.'<a href="'.$tiendas[$x]['url'].'" target="_blank">'.'<img src="img/clients/'.$tiendas[$x]['logo'].'" alt=""><center><p class="shop-description">Visitar: '.$tiendas[$x]['descripcion'].'</p>
					 
					 </center></a>';
					}
	 return $html;
	 
	}
	
	/*
		Buscar los comercios / tiendas registradas por filtros.
	*/
	public function buscarTiendaXFiltro ($filtroProducto, $filtroCategoria, $filtroMarca, $filtroCcomercial, $orderByPrecio)
	{
	 $consulta = '';
	 // $select = '';	
	 $join = '';
	 $where = '';
	 $groupBy = '';
	 $orderBy = 'order by p.precio'.' '.$orderByPrecio;
	 
	 //Si se diligencia solamente el filtro del producto por nombre o referencia:
	 if($filtroProducto <> null)
	 {		
			$consulta="select distinct p.url, p.logo, p.descripcion, p.id_tienda, p.desc_video, p.categorias, p.url_categoria , p.marcas from 


						(


						SELECT  p.precio precio, concat(t.url,'/producto/',p.referencia,'/') url, t.url url_categoria, t.logo logo, t.descripcion descripcion, t.id id_tienda, tv.desc_video desc_video, buscarCategoriaXtienda(t.id) categorias, buscarMarcaXtienda(t.id) marcas 

						FROM productoccali p 
						join producto_tienda pt on pt.id_producto = p.id 
						join tiendaccali t on t.id = pt.id_tienda 
						left join tienda_video tv on tv.id_tienda = t.id 
						WHERE upper(p.descripcion) like upper('%$filtroProducto%') 


						union 

						SELECT p.precio precio, concat(t.url,'/producto/',p.referencia,'/') url, t.url url_categoria, t.logo logo, t.descripcion descripcion, t.id id_tienda, tv.desc_video desc_video, buscarCategoriaXtienda(t.id) categorias, buscarMarcaXtienda(t.id) marcas 

						FROM productoccali p 
						join producto_tienda pt on pt.id_producto = p.id 
						join tiendaccali t on t.id = pt.id_tienda 
						left join tienda_video tv on tv.id_tienda = t.id 
						WHERE
						upper(p.referencia) like upper('%$filtroProducto%') 



						union 

						SELECT p.precio precio, concat(t.url,'/producto/',p.referencia,'/') url, t.url url_categoria, t.logo logo, t.descripcion descripcion, t.id id_tienda, tv.desc_video desc_video, buscarCategoriaXtienda(t.id) categorias, buscarMarcaXtienda(t.id) marcas 

						FROM productoccali p 
						join producto_tienda pt on pt.id_producto = p.id 
						join tiendaccali t on t.id = pt.id_tienda 
						left join tienda_video tv on tv.id_tienda = t.id 
						WHERE
						upper(p.palabra_clave) like upper('%$filtroProducto%') 

						) p ";
			
			$consulta = str_replace('$filtroProducto', $filtroProducto, $consulta);
	 }
	 
		 // Si se diligencia la categoria solamente (al diligenciar la categoria el filtro del producto se borra)
		 if($filtroCategoria <> null)
		 { 
				$consulta = "select distinct p.url, p.logo, p.descripcion , p.id_tienda, p.desc_video ,p.categorias	, p.url_categoria , p.marcas
					from 
					(SELECT p.precio, concat(t.url,'/producto/',p.referencia,'/') url, t.logo, t.descripcion, t.id id_tienda, pc.id_categoria,
					tv.desc_video, buscarCategoriaXtienda(t.id) categorias, t.url url_categoria, buscarMarcaXtienda(t.id) marcas
					   FROM productoccali p
					   join producto_categoria pc on pc.id_producto = p.id
					   join tienda_categoria tc on tc.id_categoria = pc.id_categoria
					   join tiendaccali t on t.id = tc.id_tienda
					   left join tienda_video tv on t.id = tv.id_tienda 
					   )p";
					   
				$where = 'WHERE p.id_categoria = $filtroCategoria';	   
				$groupBy  = 'group by p.id_tienda';
				$where = str_replace('$filtroCategoria', $filtroCategoria, $where);
		 }
	 
		 // Si se diligencia el filtro de marca y el de producto:
		  if($filtroMarca <> null  and $filtroProducto <> null)
		  {
				$join = ' join tienda_marca tm on tm.id_tienda = p.id_tienda and tm.id_marca = $filtroMarca';
				$join = str_replace('$filtroMarca', $filtroMarca, $join);
				
		  }
		  
		//Si se diligencia la categoria y luego se diligencia la marca del producto:
		  if($filtroCategoria <> null and $filtroMarca <> null)
		  {
				$join = $join.' join categoria_marca cm on cm.id_categoria = p.id_categoria and cm.id_marca = $filtroMarca';
				$join = str_replace('$filtroMarca', $filtroMarca, $join);
		  }
		  
		// Si solamente esta diligenciado el filtro de marca:	
		 if($filtroMarca <> null and $filtroProducto == null and $filtroCategoria == null)
		  {
				$consulta  = "SELECT distinct concat(t.url,'/producto/',p.referencia,'/') url, t.logo, t.descripcion ,tv.desc_video, buscarCategoriaXtienda(t.id) categorias, t.url url_categoria	, buscarMarcaXtienda(t.id) marcas
							   FROM productoccali p
						  join producto_tienda pt on pt.id_producto = p.id";
				$join = ' join tienda_marca tm on tm.id_tienda = pt.id_tienda
						  join tiendaccali t on t.id = tm.id_tienda
						  left join tienda_video tv on tv.id_tienda = t.id';
				$where = ' and tm.id_marca = $filtroMarca'; 
				$where = str_replace('$filtroMarca', $filtroMarca, $where);
		  }
		  
		  //Si se diligencia el filtro de marca y el de producto
		   if($filtroMarca <> null and $filtroProducto <> null)
		  {
				$join = ' join tienda_marca tm on tm.id_tienda = p.id_tienda
						  join tiendaccali t on t.id = tm.id_tienda
						  left join tienda_video tv on tv.id_tienda = t.id';
				$where = ' where tm.id_marca = $filtroMarca'; 
				$where = str_replace('$filtroMarca', $filtroMarca, $where);
		  }
		  
		  // Si se diligencia el filtro de centro comercial y el filtro de producto
			if($filtroCcomercial <> null and $filtroProducto <> null)
			 {
					$join = $join.' join tienda_ccomercial tcc on tcc.id_tienda = p.id_tienda';
					$where = $where.' and tcc.id_ccomercial = $filtroCcomercial'; 
					$where = str_replace('$filtroCcomercial', $filtroCcomercial, $where);
					
			 }
			 
			
			// Si se diligencia el filtro de centro comercial y el filtro de categoria
			if($filtroCcomercial <> null and $filtroCategoria <> null)
			 {
					$join = $join.' join tienda_ccomercial tcc on tcc.id_tienda = p.id_tienda';
					$where = $where.' and tcc.id_ccomercial = $filtroCcomercial'; 
					$where = str_replace('$filtroCcomercial', $filtroCcomercial, $where);
			 } 
		  
		  
		  //Si se diligencia el filtro del centro comercial y el filtro de marca
		     if($filtroCcomercial <> null and $filtroMarca <> null)
			 {
					$join = $join.' join tienda_ccomercial tcc on tcc.id_tienda = tm.id_tienda';
					$where = $where.' and tcc.id_ccomercial = $filtroCcomercial'; 
					$where = str_replace('$filtroCcomercial', $filtroCcomercial, $where);
			 }
	
	  
	  if($consulta <> '' or $consulta <> null)
	  {
	  
		$resultado = $this->conexion->consultar($consulta.' '.$join.' '.$where.' '.$groupBy.' '.$orderBy);
	  }
	 
	   // echo $consulta.' '.$join.' '.$where.' '.$groupBy.' '.$orderBy; 
	  // die();
	 
	 return $resultado;
	 
	}
	
	/*
		Cargar el combo de categoria y demás combos necesarios.
	*/
	public function cargarCombo ($query=null)
	{	
		if($query == null)
		{
			$query = 'select id, descripcion from categoria where activa = 1';
		}
		$resultado = $this->conexion->consultar($query);
		$numfilas = count($resultado);
		$combo='<option></option>';
			for ($x=0;$x<$numfilas;$x++) 
			{
			    $combo = $combo.'<option value = "'.$resultado[$x]['id'].'">'.$resultado[$x]['descripcion'].'</option>'."\n";
			}
		
		return $combo;
	}
	
	/*
		Cargar el combo de los centros comerciales registrados.
	*/
	public function cargarComboCentrosC()
	{	
		$query = 'SELECT id,descripcion 
				FROM centro_comercial 
					where activo = 1
				  order by posicion asc';
		$resultado = $this->cargarCombo($query);
		return $resultado;
	}
	
	/*
		Cargar el combo de las marcas de productos registradas.
	*/
	public function cargarComboMarca()
	{	
		$query = 'SELECT id, descripcion FROM `marca`  where activo = 1';
		$resultado = $this->cargarCombo($query);
		return $resultado;
	}
	
	public function cargarComboXparametro($parametro,$indFiltro)
	{	
		
		switch ($indFiltro)
		{
			//Cargar combo de marcas por categoria seleccionada:
			case 'filtro-categoria':
			if (!$parametro)
			{
				$parametro = 'cm.id_categoria';
			}
				$query = 'SELECT distinct m.id, m.descripcion 
							FROM marca m
						join categoria_marca cm on m.id = cm.id_marca
						where cm.activo = 1
						and cm.id_categoria = '.$parametro.'
						order by posicion asc';
					
			break;
			
			//Cargar combo de categorias por marca seleccionada:
			case 'filtro-marca':
			if (!$parametro)
			{
				$parametro = 'cm.id_marca';
			}
				$query = 'SELECT distinct c.id, c.descripcion 
							FROM categoria c
						join categoria_marca cm on c.id = cm.id_categoria
						where cm.activo = 1
						and cm.id_marca = '.$parametro.'
						order by posicion asc';
					
			break;
			
			
		}
		
				  
		$resultado = $this->cargarCombo($query);
		return $resultado;
	}
	
	
	/*
		consultar los usuarios.
	*/
	
	public function GetData($tabla,$arrayParametros){
	 $condicion ='';
	 $indice = 0;
	 
	 if($arrayParametros){
	 
		foreach ($arrayParametros as $key => $valor){
			
			$condicion = $condicion.$key.' = "'.$valor.'"';	
			$indice++;
			
			if(count($arrayParametros) > $indice){
				$condicion = $condicion.' AND ';		
			} 
		}
		$query = 'SELECT * FROM '.$tabla.' WHERE '.$condicion;
	 } else {
			$query = 'SELECT * FROM '.$tabla;
		}
		//	var_dump($query);	
		//	die();
		$resultado = $this->conexion->consultar($query);
		return $resultado;
	}
	
	
}


?>