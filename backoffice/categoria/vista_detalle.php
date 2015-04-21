<?php
  // Detalle para un Articulo ?>
  
  <?php require '../../html/backoffice/head.php'; ?>



<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
           <h1 class="page-header">Categorias</h1>
         </div>
        <!-- /.col-lg-12 -->
        </div>
            <!-- /.row -->
            <div class="row">
            
         	
         	  <!-- CONTENIDO PROPIO -->
         	     
           	  <h1> Detalle categoria: <?php echo $categoria['titulo'];?></h1>
			  
			  <form action="<?php echo(CONTROLLER_CATEGORIA);?>" method="post">
			  	<div class="form-group">
			  	<input type="text" name="titulo" required placeholder="Titulo minimo 5 letras" pattern=".{5,}" value="<?php echo $categoria['titulo'];?>">
			  	</div>
			  	
			  	<div class="form-group">
			  	<input type="hidden" name="id" value="<?php echo $categoria['id'];?>">
			  	</div>
			  	
			  	<?php if( $categoria['id'] != -1 ){?>
				  	<input type="hidden" name="op" value="4">
				  	<input type="submit" value="modificar" class="btn btn-outline btn-primary btn-lg">
			  	<?php } else { ?>
			  		<input type="hidden" name="op" value="0">
				  	<input type="submit" value="Crear" class="btn btn-outline btn-primary btn-lg">
			  	<?php } ?>
			  	
			  </form>
			  
			  <!-- END CONTENIDO PROPIO -->
  
  	</div><!-- /.row -->
</div><!-- <div id="page-wrapper"> -->

<?php require '../../html/backoffice/footer.php'; ?>
  