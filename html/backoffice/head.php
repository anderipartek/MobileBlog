<?php
	/*
	 * 
	 *  file: /html/backoffice/
	 */ 
?>


<?php require_once '../../core/config.php';?>
<?php require_once '../../core/utilidades.php';?>

<?php 
//comprobar session del usuario
Utilidades::checkSession();
?>



<!DOCTYPE html>
<html lang="en">

<head>

	<base href="<?php echo(WEBROOT_HTML_BACK); ?>">
	
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<title>Backoffice</title>
	
	  <!-- Bootstrap Core CSS -->
	   <link href="css/bootstrap.min.css" rel="stylesheet">
	   
	    <!-- Datatable responsive style https://datatables.net/extensions/responsive/examples/styling/bootstrap.html#  -->
		<link href="css/dataTables.bootstrap.css" rel="stylesheet">
		<link href="css/dataTables.responsive.css" rel="stylesheet">		
		
	    <!-- Custom CSS -->
	    <link href="css/sb-admin-2.css" rel="stylesheet">
	
	    <!-- Custom Fonts -->
	    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	    
	    <!-- DAtaTables -->
	    <link href="js/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
	    <link href="js/datatables/css/jquery.dataTables_themeroller.css" rel="stylesheet" type="text/css">
	    
	
	    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->

</head>


<body>

    <div id="wrapper">
    
    
    <?php require 'navigation.php';?>

