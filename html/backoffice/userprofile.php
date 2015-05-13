<?php
  // Detalle para un Articulo ?>

<?php require '../../html/backoffice/head.php'; ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Datos Usuario - <?php echo $perfil['nombre'];?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <table class="row">
        <tr class="form-group">
            <td colspan="2" class="thumb">
                <img src="../../images/av_user2.jpg" width="120" height="120" alt="Cambiar Avatar">
            </td>
        </tr>
        <tr class="form-group">
            <td id="nombre">Nombre:</td>
            <td><?php echo $perfil['nombre'];?></td>
        </tr>

        <tr class="form-group">	
            <td id="email">Email: </td>
            <td><?php echo $perfil['email'];?></td>
        </tr>				  	

        <tr class="form-group">	
            <td id="password">Password: </td>
            <td><?php echo $perfil['password'];?></td>
        </tr>

        <tr class="form-group">	
            <td id="rol">Rol: </td>
            <td>
            <?php
            if($perfil['rol']==0) {
                echo "Administrador";
            }
            else {
                echo "Usuario";
            }
            ?>
            </td>
        </tr>
    </table><!-- /.row -->    

    <h1 class="page-header">Datos Usuario - <?php echo $perfil['nombre'];?></h1>
    
    <div class="row">

        <div class="form-group">
              <label id="nombre">Nombre: </label> <?php echo $perfil['nombre'];?>
        </div>

        <div class="form-group">	
          <label id="email">Email: </label> <?php echo $perfil['email'];?>
        </div>				  	

        <div class="form-group">	
              <label id="password">Password: </label> <?php echo $perfil['password'];?>
        </div>

        <div class="form-group">	
            <label id="rol">Rol: </label>
            <?php
            if($perfil['rol']==0) {
                echo "Administrador";
            }
            else{
                echo "Usuario";
            }
            ?>
        </div>	  
    </div><!-- /.row -->

</div><!-- <div id="page-wrapper"> -->

<?php require '../../html/backoffice/footer.php'; ?>