<?php 

    $active10="active";
    include "header.php";
    include "sidebar.php";

    $id=intval($_GET['id']);

    if (isset($_GET['id']) && !empty($_GET['id'])){
        $id=$_GET["id"];
    } else {
        header("Location: clientes.php");  
    }

    $sql=mysqli_query($con, "select * from clientes where id=$id");
    $rows=mysqli_fetch_array($sql);
        $id=$rows['id'];
        $business=$rows['business'];
        $fullname=$rows['fullname'];
        $email=$rows['email'];
        $ruc=$rows['ruc'];
    
    
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
                                  <label for="empresa">Empresa:</label>
                                  <input type="text" name="empresa" class="form-control" id="empresa" placeholder="Empresa" required value="<?php echo $business ?>">
                                </div>
                                <div class="form-group">
                                  <label for="encargado">Encargado:</label>
                                  <input type="text" name="encargado" class="form-control" id="encargado" placeholder="Encargado" required value="<?php echo $fullname ?>">
                                </div>
                                <div class="form-group">
                                  <label for="email">E-mail:</label>
                                  <input type="email" name="email" class="form-control" id="email" placeholder="E-mail" value="<?php echo $email ?>" required>
                                </div>
                                <div class="form-group">
                                  <label for="ruc">Ruc</label>
                                  <input type="text" name="ruc" class="form-control" id="ruc" placeholder="Ruc" value="<?php echo $ruc ?>" required>
                                </div>
                                <input type="hidden" name="mod_id" value="<?php echo $id ?>">
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