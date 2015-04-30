<?php

/**
 * Controlador Pagina Principal, donde se muestran las ultimas 10 noticias
 * 
 * TODO cuando se haga scroll hacia abajo que cargue otras 10 noticias con AJAX
 * cambio oli
 */

require_once 'core/config.php';
require_once 'core/Database.php';
require_once 'backoffice/articulo/modelo.php';


//recoger articulos
$articulos = getArticulos();
//var_dump($articulos);


//perfil usuario en session
if(!isset($_SESSION)){
	session_start();
}

if(isset($_SESSION["perfil"])){
	$perfil = $_SESSION["perfil"];
	//var_dump($perfil);
}


require 'html/public/vista.php';


?>








