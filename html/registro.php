<?php 
/* 
 * 	file:html/registro.php 
 *  author: Ander Uraga
 *  email: amnsdnd
 *  version:dff
 *  date:  
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

    <title>Registro | MobileApp</title>

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
                        <h3 class="panel-title">Registrate como nuevo usuario</h3>
                    </div>
                    
                 
                     <?php Utilidades::pintarMensaje();  ?>
                    
                    
                    <div class="panel-body">
                                        
                        <form id="form-registro" role="form" action="<?php echo CONTROLLER_REGISTRO; ?>" method="post">
                            <fieldset>
                            	<div class="form-group">
                                    <input class="form-control" placeholder="Nombre Usuario" name="usuario" type="text" autofocus required pattern=".{6,}">
                                    <span id="tooltip"></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" required>
                                    <span id="tooltip2"></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Repite password" name="repitpassword" type="password" value="" required>
                                </div>
                                
                                <input type="submit" name="submit" id="btn_submit" class="btn btn-lg btn-success btn-block" value="Registrate">
                                
                            </fieldset>
                        </form>
                        

                        
                    </div>
                </div>
            </div>
        </div>
    </div>

  
  <script src="public/js/jquery.min.js"></script>
  <script>
	  $( document ).ready(function() {
		 
		  console.info('Jquery cargado');


		  var tooltip = $('#tooltip'); //.html('hola');
		  var tooltip2 = $('#tooltip2');
		  var inputNombre = $('#form-registro input[name="usuario"]');
		  var inputEmail = $('#form-registro input[name="email"]');
		  var submit = $('#form-registro input[name="submit"]');

		  inputNombre.keyup(function(){

			console.info('llamada Ajax');

			$.ajax("ajax-registro.php", {
				   "type": "get",   // usualmente post o get
				   "success": function(json) {
					  // var json = JSON.parse(data);
					   tooltip.html(json.msg);		
					   if(json.result=="error"){
							submit.attr('disabled', 'disabled');
						}else{
							submit.removeAttr('disabled');
						}	     
				   },
				   "error": function(result) {
				     console.error("Este callback maneja los errores", result);
				   },
				   "data": {usuario: inputNombre.val()},
				   "async": true,
				});
			
		  });

		  inputEmail.keyup(function(){

				console.info('llamada Ajax');

				$.ajax("ajax-registro.php", {
					   "type": "get",   // usualmente post o get
					   "success": function(json) {
					     console.info("Retorno OK");
						 //var json = JSON.parse(data);
						 tooltip2.html(json.msg);
						 if(json.result=="error"){
							submit.attr('disabled', 'disabled');
						 }else{
							submit.removeAttr('disabled');
						 }		     
					   },
					   "error": function(result) {
					     console.error("Este callback maneja los errores", result);
					   },
					   "data": {email: inputEmail.val()},
					   "async": true,
					});
				
			  });
		  
		  
		});


		//guardar datos del formulario con local storage
		if(window.sessionStorage){
			console.debug('sessionStorage soportado');

			sessionStorage['test']=3;
			console.debug('el valor de test sessionStorage es: ' + sessionStorage['test']);

			//capturar click del boton del formulario
			$('#form-registro').submit(function(e){
				//e.preventDefault(); //cancela el evento de submitar
				//guardar en sessionStorage
				sessionStorage['reg_email'] = $('#form-registro input[name="email"]').val();
				sessionStorage['reg_nombre'] = $('#form-registro input[name="nombre"]').val();

			});

			if(sessionStorage['reg_email'] != undefined){
				$('#form-registro input[name="email"]').val(sessionStorage['reg_email']);
			}	
			if(sessionStorage['reg_nombre'] != undefined){
				$('#form-registro input[name="nombre"]').val(sessionStorage['reg_nombre']);
			}	
			
		}else{
			console.warning('sessionStorage NO soportado');
		}

		
		
  </script>

</body>

</html>
