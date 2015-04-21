<?php
	require_once ('../../core/config.php');
	require_once ('../../core/Database.php');
	require_once ('../../core/utilidades.php');
	
	require_once ('modelo.php');
	
	
	//comprobar session del usuario
	Utilidades::checkSession();
	
	//recoger usuario de session
	if(!isset($_SESSION)){
		session_start();
	}
	$perfil = $_SESSION['perfil'];
	
	//recoger operacion a realizar
	$op = 1; 
	
	if ( isset($_GET["op"]) ){
		$op = $_GET["op"];
	}
	
	if ( isset($_POST["op"]) ){
		$op = $_POST["op"];	
	}
	
	if ( $op == -1){
		echo("No se ha solicitado ningun operación");
	}
	
	
	//Realizar operacion en funcion de la "op"
	switch ($op) {
		case 0:
			op_insert();
			break;
		case 1:		
			op_listar();
			break;
		case 2:
			op_detalle();
			break;
		case 3:
			op_eliminar();
			break;
		case 4:
			op_modificar();
			break;
	}
	
	
	function op_listar(){	
		//obtener todos los articulos
		$categorias = getCategorias();
		//llamar vista listado
		require('vista.php');
	}
	
	function op_insert(){
		//realizar inserccion
		if (isset($_POST["titulo"])) {
			insertarCategoria(  $_POST["titulo"] ); 
			//listar de nuevo todos
			op_listar();
		}else{
			echo("No se puede insertar sin titulo");
		}	
	}
	
	function op_eliminar(){
		eliminarCategoria( $_GET["id"] );
		op_listar();	
	}
	
	function op_detalle(){
		if ( isset($_GET['id']) ){
			//Obtener artículo del modelo
			$categoria = detalleCategoria( $_GET['id'] );
		}else{
			//Crear nuevo articulo
			$categoria = array (
							'id'	 => -1,
							'titulo' => '' 
						);
		}
		require('vista_detalle.php');
	}
	
	function op_modificar(){
		if ($_POST) {
			modificarCategoria( $_POST['id'], $_POST['titulo'] );
		} else {
			echo ("No se puede insertar por GET");
		}
		op_listar();	
	}
	
?>