<?php
require_once ('../../core/config.php');
require_once '../../core/Database.php';
require_once('../../core/utilidades.php');

require_once ('modelo.php');

//comprobar session del usuario
Utilidades::checkSession();

// recoger operacion a realizar
$op = 1;

if (isset ($_GET["op"])) {
    $op = $_GET["op"];
}
if (isset ($_POST["op"])) {
    $op = $_POST["op"];
}
if ($op == - 1) {
    echo ("No se ha solicitado ningun operaci&oacute;n");
}

// Realizar operacion en funcion de la "op"
switch ($op) {
    case OP_INSERTAR :
        op_insert ();
        break;
    case OP_LISTAR :
        op_listar ();
        break;
    case OP_DETALLE :
        op_detalle ();
        break;
    case OP_ELIMINAR :
        op_eliminar ();
        break;
    case OP_MODIFICAR :
        op_modificar ();
        break;
}
function op_listar() {
    // obtener todos los articulos
    $usuarios = getUsuarios();
    // llamar vista listado
    require ('vista.php');
}

function op_insert() {
    // realizar inserccion
    if ($_POST) {
        insertarUsuario ($_POST['email'], $_POST['password'], $_POST['nombre'], $_POST['rol']);
        op_listar ();
    }
    else {
        echo ("No se puede insertar por GET");
    }
}

function op_eliminar() {
    eliminarUsuario ($_GET["id"]);
    op_listar ();
}


function op_detalle() {
    if (isset ($_GET['id'])) {
        // obtener articulo del modelo
        $user = detalleUsuario ($_GET['id']);
    } else {
        // crear nuevo articulo
        $user = array (
            'id'       => - 1,
            'nombre'   => '',
            'password' => '',
            'email'    => 'tu@email.com',
            'rol'      => 1
        );
    }
    require ('vista_detalle.php');
}

function op_modificar() {
    if ($_POST) {
        modificarUsuario ($_POST['id'], $_POST['email'], $_POST['password'],$_POST['nombre'],$_POST['rol']);
    }
    else {
        echo ("No se puede insertar por GET");
    }
    op_listar ();
}
