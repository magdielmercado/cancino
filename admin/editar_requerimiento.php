<?php 
 
    $active13="active";
    include "header.php";
    include "sidebar.php";

    $id=intval($_GET['id']);

    if (isset($_GET['id']) && !empty($_GET['id'])){
        $id=$_GET["id"];
    } else {
        header("Location: areas.php");  
    }

    $sql=mysqli_query($con, "select * from tipos_requerimientos where id=$id");
   $rows=mysqli_fetch_array($sql);
        $id=$rows['id'];
        $name=$rows['name'];
    
    
    if($is_admin!=1){
        //header("location: dashboard.php");
        print "<script>window.location='dashboard.php?error';</script>";
    }
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Tipos de Requerimientos</h1>
            <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="tipos_requerimientos.php"><i class="fa fa-bars"></i> Tipos de Requerimientos</a></li>
                <li class="active">Editar Requerimiento</li>
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
                            <h3 class="box-title">Editar Requerimiento</h3>
                        </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                        <form role="form" method="post" name="upd" id="upd">
                            <div class="box-body">
                                <div class="form-group">
                                  <label for="requerimiento">Requerimiento</label>
                                  <input type="text" name="requerimiento" class="form-control" id="requerimiento" placeholder="Requerimiento" value="<?php echo $name ?>">
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
            url: "action/updtyperequire.php",
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