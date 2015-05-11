<?php 
/* 
 * 	file:html/login.php 
 *  author: Ander Uraga
 *  email: amnsdnd
 *  version:v1.0
 *  date:  today
 * 
 */ 
require_once '../core/config.php';
require_once '../core/utilidades.php';


?>



<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="pagina de logeo">
    <meta name="author" content="">

    <title>Login | MobileApp</title>

    <!-- Bootstrap Core CSS -->
    <link href="backoffice/css/bootstrap.min.css" rel="stylesheet">

   
    <!-- Custom CSS -->
    <link href="backoffice/css/sb-admin-2.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><a href="<?php echo WEBROOT ?>">Volver a la Web</a></h3>
                    </div>
                    
                 
                    <?php Utilidades::pintarMensaje();  ?>
                    
                    
                    <div class="panel-body">
                                        
                        <form role="form" action="<?php echo CONTROLLER_LOGIN; ?>" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <div class="form-group">
                                    <a href="registro.php"> ¿No tienes cuenta? ¡Registrate! </a>
                                </div>
                                                             
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Logeate">
                                
                            </fieldset>
                        </form>
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

  

</body>

</html>
