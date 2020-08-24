<?php 

    $active10="active";
    include "header.php";
    include "sidebar.php";

    $rfccliente=intval($_GET['rfccliente']);

    if (isset($_GET['rfccliente']) && !empty($_GET['rfccliente'])){
        $id=$_GET["rfccliente"];
    } else {
        header("Location: clientes.php");  
    }

    $sql=mysqli_query($con, "select * from cliente where rfccliente=$rfccliente");
    $rows=mysqli_fetch_array($sql);
        $rfccliente=$rows['rfccliente'];
        $nombrecliente=$rows['nombrecliente'];
        $contactocliente=$rows['contactocliente'];
        $telefonocliente=$rows['telefonocliente'];
        $correocliente=$rows['correocliente'];
    
     
    
    
    if($is_admin!=1){
        //header("location: dashboard.php");
        print "<script>window.location='dashboard.php?error';</script>";
    }
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Cliente</h1>
            <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="clientes.php"><i class="fa fa-th-child"></i> Clientes</a></li>
                <li class="active">Editar Cliente</li>
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
                            <h3 class="box-title">Editar Cliente</h3>
                        </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                        <form role="form" method="post" name="upd" id="upd">
                            <div class="box-body">
                                <div class="form-group">
                                  <label for="Empresa">RFC Cliente:</label>
                                  <input type="text" name="rfccliente" class="form-control" id="rfccliente" placeholder="RFC cliente" required value="<?php echo $rfccliente ?>">
                                </div>
                                <div class="form-group">
                                  <label for="encargado">Nombre  del cliente:</label>
                                  <input type="text" name="nombrecliente" class="form-control" id="nombrecliente" placeholder="Nombre del cliente" required value="<?php echo $nombrecliente ?>">
                                </div>
                                 <div class="form-group">
                                  <label for="telefono">Telefono del cliente:</label>
                                  <input type="text" name="telefonocliente" class="form-control" id="telefonocliente" placeholder="Telefono de cliente" required value="<?php echo $telefonocliente ?>">
                                </div>
                                <div class="form-group">
                                  <label for="email">Correo de cliente:</label>
                                  <input type="email" name="correocliente" class="form-control" id="correocliente" placeholder="E-mail" value="<?php echo $correocliente ?>" required>
                                </div>
                                 <div class="form-group">
                                  <label for="ruc">Contacto cliente</label>
                                  <input type="text" name="contactocliente" class="form-control" id="contactocliente" placeholder="Contacto cliente" value="<?php echo $contactocliente ?>" required>
                                </div>
                                <input type="hidden" name="mod_id" value="<?php echo $rfccliente ?>">
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
            url: "action/updclient.php",
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