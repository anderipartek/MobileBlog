<?php
require_once ('../../core/config.php');
require_once ('../../core/Database.php');
require_once('../../core/utilidades.php');

require_once('modelo.php');

//comprobar session del usuario
Utilidades::checkSession();

//recoger usuario de session
if(!isset($_SESSION)) {
	session_start();
}
$perfil = $_SESSION['perfil'];

//recoger operacion a realizar
$op = 1; 

if (isset($_GET["op"])) {
    $op = $_GET["op"];
}
if (isset($_POST["op"]) ) {
    $op = $_POST["op"];	
}
if ($op == -1) {
    echo("No se ha solicitado ningun operación");
}

//Realizar operacion en funcion de la "op"
switch ($op) {
    case OP_INSERTAR:
        op_insert($perfil);
        break;
    case OP_LISTAR:		
        op_listar($perfil);
        break;
    case OP_DETALLE:
        op_detalle($perfil);
        break;
    case OP_ELIMINAR:
        op_eliminar($perfil);
        break;
    case OP_MODIFICAR:
        op_modificar($perfil);
        break;
}

function op_listar($perfil) {	
    //obtener todos los articulos
    if ($perfil['rol'] == Constantes::$ROL_ADMINISTRADOR) {
        $articulos = getArticulos( -1 , null, null);
    }
    else {
        //var_dump($_POST['id_categoria']);
        $articulos = getArticulos(-1 , $perfil['id'], null);
    }	
    //llamar vista listado
    require('vista.php');
}

function op_insert($perfil) {
    //realizar inserccion
    if (isset($_POST["titulo"])) {
        insertarArticulo($_POST["titulo"] ,$perfil['id'] , $_POST['id_categoria'], $_POST['contenido'], Utilidades::uploadFoto()); 
        //listar de nuevo todos
        op_listar($perfil);
    }
    else {
        echo("No se puede insertar sin titulo");
    }	
}

function op_eliminar($perfil) {
    eliminarArticulo($_GET["id"]);
    op_listar($perfil);
}

function op_detalle($perfil) {
    //obtener categorias
    require_once '../categoria/modelo.php';
    $categorias = getCategorias();
    
    if (isset($_GET['id'])) {
        //obtener articulo del modelo
        $articulo = detalleArticulo($_GET['id']);
    }
    else {
        //crear nuevo articulo
        $articulo = array(
            'id'           => -1,
            'titulo'       => '',
            'id_categoria' => '',
            'contenido'    => '',
            'foto'         => ''	
        );
    }
    
    //si es administrador obtener usuarios para poder asisgnar el articulo a otra persona
    if ($perfil['rol'] == Constantes::$ROL_ADMINISTRADOR) {
        require_once '../usuario/modelo.php';
        $usuarios = getUsuarios();
    }
    require('vista_detalle.php');
}

/**
 * Modificación del artículo
 * @param array $perfil los datos del usuario
 */
function op_modificar($perfil) {
    //Crear variable para ID de USUARIO
    $id_usuario = $perfil['id']; 
    //Si el formulario me envia el id_usuario lo uso:
    if (isset($_POST["id_usuario"])) {
        $id_usuario = $_POST["id_usuario"];
    }
    modificarArticulo($_POST['id'], $_POST['titulo'], $id_usuario, $_POST['id_categoria'], $_POST['contenido'], Utilidades::uploadFoto());
    op_listar($perfil);
}
