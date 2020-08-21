<?php 

    $active11="active";
    include "header.php";
    include "sidebar.php";

    $id=intval($_GET['idpuesto']);

    if (isset($_GET['idpuesto']) && !empty($_GET['idpuesto'])){
        $idpuesto=$_GET["idpuesto"];
    } else {
        header("Location: puestos.php");  
    }

    if($is_admin!=1){
        //header("location: dashboard.php");
        print "<script>window.location='dashboard.php?error';</script>";
    }

    $sql=mysqli_query($con, "select * from puesto where idpuesto = $idpuesto");
    $rows=mysqli_fetch_array($sql);
        $idpuesto=$rows['idpuesto'];
        $nombrepuesto=$rows['nombrepuesto'];
    
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Puesto</h1>
            <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="puesto.php"><i class="fa fa-th-child"></i> Puesto</a></li>
                <li class="active">Editar Puesto</li>
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
                            <h3 class="box-title">Editar Puesto</h3>
                        </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                        <form role="form" method="post" name="upd" id="upd">
                            <div class="box-body">
                                <div class="form-group">
                                  <label for="usuario">Nombre del Puesto:</label>
                                  <input type="text" name="nombrepuesto" class="form-control" id="nombrepuesto" placeholder="Puesto" value="<?php echo $nombrepuesto ?>">
                                </div>
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox" <?php if($is_admin==1){echo "checked"; } ?> name="is_admin"> Administrador
                                  </label>
                                </div>
                                <input type="hidden" name="idpuesto" value="<?php echo $idpuesto ?>">
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
            url: "action/updpuesto.php",
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