<?php
	
	require_once '../../core/Database.php';

     error_reporting(E_ALL ^ E_DEPRECATED);

	//detalle:    SELECT id, fecha, titulo FROM articulo where id=1
	//eliminar:   DELETE FROM `articulo` WHERE `id`=1
	//insertar:   INSERT INTO `articulo`( `titulo`) VALUES ("SSSSSSSS")
	//modificar:  UPDATE `articulo` SET `titulo`=["el que quiera"] WHERE id=1

	function insertarCategoria($titulo){
		$cn = mysql_connect('localhost', 'root', '');
		mysql_select_db('mb15', $cn);
		
		$sql = 'INSERT INTO `categoria`(`titulo`) VALUES ("'.$titulo.'")';
		//echo ("sql " . $sql);
		if ( !mysql_query( $sql, $cn) )
		{
			echo ("fallo insert " . $sql);
		}
		
		mysql_close();
	}

	
	/**
	 * Eliminar un articulo por su identificador
	 * @param $id identifacor del articulo
	 * @return boolean si elimina true, en caso contrario false
	 */
	function eliminarCategoria( $id ){
		$resul = false;
		
		$cn = mysql_connect('localhost', 'root', '');
		mysql_select_db('mb15', $cn);
		
		$resul = mysql_query('DELETE FROM categoria WHERE id='.$id , $cn);
		
		mysql_close();
		
		return $resul;		
	}


	/**
	 * Obtiene el detalle de un articulo por su identificador
	 * @param $id identificador del articulo
	 * @return articulo si existe, en caso contraio null
	 */
	function detalleCategoria( $id )
	{
		$cn = mysql_connect('localhost', 'root', '');
		mysql_select_db('mb15', $cn);
	
		$resultado = mysql_query('SELECT id ,fecha, titulo FROM categoria where id='.$id , $cn);
		
		$categorias = array();
	
		while($categoria = mysql_fetch_assoc($resultado))
		{
			$categorias[] = $categoria;
		}
	
		mysql_close();
	
		//comrpobar longitud antes de retornar
		if ( sizeof($categorias) > 0 ){
			return $categorias[0];
		}else {
			return null;	
		}	
	}
	
	
	function getCategorias()
	{
		$cn = mysql_connect('localhost', 'root', '');
		mysql_select_db('mb15', $cn);
	
		$resultado = mysql_query('SELECT id, fecha, titulo FROM categoria', $cn);
		$articulos = array();
		 
		while($categoria = mysql_fetch_assoc($resultado))
		{
			$categorias[] = $categoria;
		}
		 
		mysql_close();
	
		return $categorias;
	}

	
	function modificarCategoria( $id, $tit ){
		$cn = mysql_connect('localhost', 'root', '');
		mysql_select_db('mb15', $cn);
		
		       
		$sql = 'UPDATE `categoria` SET `titulo`="'.$tit.'" WHERE `id`='.$id;
		
		if ( !mysql_query( $sql, $cn) )
		{
			echo ("fallo update " . $sql);
		}
		
		mysql_close();
		
	}

	
?>