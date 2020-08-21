<?php 

    $active11="active";
    include "header.php";
    include "sidebar.php";

    $idusuario=intval($_GET['idusuario']);

    if (isset($_GET['idusuario']) && !empty($_GET['idusuario'])){
        $idusuario=$_GET["idusuario"];
    } else {
        header("Location: usuarios.php");  
    }

    if($is_admin!=1){
        //header("location: dashboard.php");
        print "<script>window.location='dashboard.php?error';</script>";
    }

    $sql=mysqli_query($con, "select * from usuario where idusuario=$idusuario");
    $rows=mysqli_fetch_array($sql);
        $idusuario=$rows['idusuario'];
        $usuario=$rows['usuario'];
        $contrasena=$rows['contrasena'];
        $nombreusuario=$rows['nombreusuario'];
        $idpuesto=$rows['idpuesto'];
    
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Usuarios</h1>
            <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="usuarios.php"><i class="fa fa-th-child"></i> Usuarios</a></li>
                <li class="active">Editar Usuario</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-xs-12 col-md-6">
                <div id="result"></div>
                    <!-- general form elements -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Editar Usuario</h3>
                        </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                        <form role="form" method="post" name="upd" id="upd">
                            <div class="box-body">
                                <div class="form-group">
                                  <label for="usuario">ID Usuario:</label>
                                  <input type="text" name="idusuario" class="form-control" id="idusuario" placeholder="ID Usuario" disabled="true" value="<?php echo $idusuario ?>" >
                                </div>
                                <div class="form-group">
                                  <label for="nombre">Usuario:</label>
                                  <input type="text" name="usuario" class="form-control" id="usuario" placeholder=" Usuario" value="<?php echo $usuario ?>">
                                </div>
                                <div class="form-group">
                                  <label for="contrasena">Contraseña:</label>
                                  <input type="password" name="contrasena" class="form-control" id="contrasena" placeholder="Contraseña">
                                  <p class="text-info">La contraseña solo se modifica si escribes algo, en caso contrario no.</p>
                                </div>
                                  <div class="form-group">
                                  <label for="nombreusuario">Nombre Usuario:</label>
                                  <input type="text" name="nombreusuario" class="form-control" id="nombreusuario" placeholder="Nuevo Usuario" value="<?php echo $nombreusuario ?>">
                                </div>
                                <div class="form-group">
                                  <label for="puesto">Puesto:</label>
                                 <!-- <input type="text" name="idpuesto" class="form-control" id="idpuesto" placeholder="ID Puesto" value="<?php echo $idpuesto ?>">-->
                                  <select class="form-control" name ="idpuesto" id="idpuesto">
                                    <?php
                                      $sql = "select * from puesto;";
                                      $query = mysqli_query($con, $sql);
                                      while($registro  = mysqli_fetch_array($query))
                                      {
                                        echo "<option ";
                                        if ( $idpuesto == $registro["idpuesto"] )
                                          echo "selected";
                                        echo " value='".$registro['idpuesto']."'>".$registro['nombrepuesto']."</option>";
                                      }
                                    ?>  
                                  </select>
                                </div>
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox" <?php if($is_admin==1){echo "checked"; } ?> name="is_admin"> Administrador
                                  </label>
                                </div>
                                <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" id="save_data" class="btn btn-success">Actualizar</button>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

  <?php include "footer.php" ?>

<script>
$( "#upd" ).submit(function( event ) {
  $('#upd_data').attr("disabled", true);
  
 var parametros = $(this).serialize();
     $.ajax({
            type: "POST",
            url: "action/upduser.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#result").html("Mensaje: Cargando...");
              },
            success: function(datos){
            $("#result").html(datos);
            $('#upd_data').attr("disabled", false);
            load(1);
          }
    });
  event.preventDefault();
})

</script>