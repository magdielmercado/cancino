<?php 

    $active10="active";
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
            <h1>Clientes</h1>
            <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="clientes.php"><i class="fa fa-child"></i> Clientes</a></li>
                <li class="active">Nuevo Cliente</li>
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
                            <h3 class="box-title">Nuevo Cliente</h3>
                        </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                        <form role="form" method="post" name="add" id="add">
                            <div class="box-body">
                                <div class="form-group">
                                  <label for="empresa">Empresa: </label>
                                  <input type="text" name="empresa" class="form-control" id="empresa" placeholder="Empresa" required>
                                </div>
                                <div class="form-group">
                                  <label for="encargado">Encargado: </label>
                                  <input type="text" name="encargado" class="form-control" id="encargado" placeholder="Encargado" required>
                                </div>
                                <div class="form-group">
                                  <label for="email">E-mail: </label>
                                  <input type="email" name="email" class="form-control" id="email" placeholder="Correo Electrónico" required>
                                </div>
                                <div class="form-group">
                                  <label for="ruc">RUC: </label>
                                  <input type="text" name="ruc" class="form-control" id="ruc" placeholder="RUC" required maxlength="11">
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
            url: "action/addclient.php",
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