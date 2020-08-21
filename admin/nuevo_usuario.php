<?php 

    $active11="active";
    include "header.php";
    include "sidebar.php";
        if($is_admin!=1){
        //header("location: dashboard.php");
        print "<script>window.location='dashboard.php?error';</script>";
    }
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Usuarios</h1>
            <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="usuarios.php"><i class="fa fa-child"></i> Usuarios</a></li>
                <li class="active">Nuevo Usuario</li>
            </ol>
        </section>
        <br>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-xs-12 col-md-6">
                <div id="result"></div>
                    <!-- general form elements -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Nuevo Usuario</h3>
                        </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                        <form role="form" method="post" name="add" id="add">
                            <div class="box-body">
                                <div class="form-group">
                                  <label for="usuario">Usuario: </label>
                                  <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Nombre" required>
                                </div>
                                <div class="form-group">
                                  <label for="nombre">Contraseña: </label>
                                  <input type="password" name="contrasena" class="form-control" id="contrasena" placeholder="Contraseña" required>
                                </div>
                                <div class="form-group">
                                  <label for="nombre">Nombre de usuario: </label>
                                  <input type="text" name="nombreusuario" class="form-control" id="nombreusuario" placeholder="Nombre de usuario">
                                </div>
                                <div class="form-group">
                                  <label for="puesto">ID Puesto: </label>
                             <!-- <input type="text" name="idpuesto" class="form-control" id="idpuesto" placeholder="Puesto"> -->
                                  <select class="form-control" name ="idpuesto" id="idpuesto">
                                  <option value="1">Director</option>
                                  <option value="2">Gerente</option>
                                  <option value="3">Subgerente</option>
                                  <option value="4">Contador</option>
                                  <option value="5">Colaborador</option>
                                </select>
                                </div>
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox" name="is_admin"> Administrador
                                  </label>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" id="save_data" class="btn btn-success">Agregar</button>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

  <?php include "footer.php" ?>

<script>
$( "#add" ).submit(function( event ) {
  $('#save_data').attr("disabled", true);
  
 var parametros = $(this).serialize();
     $.ajax({
            type: "POST",
            url: "action/adduser.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#result").html("Mensaje: Cargando...");
              },
            success: function(datos){
            $("#result").html(datos);
            $('#save_data').attr("disabled", false);
            load(1);
          }
    });
  event.preventDefault();
})

</script>