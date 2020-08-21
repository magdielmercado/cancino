<?php 

    $active2="active";
   // $active3="active";
    include "header.php";
    include "sidebar.php";

    $id=intval($_GET['id']);

       if (isset($_GET['id']) && !empty($_GET['id'])){
        $id=$_GET["id"];
    } else {
        header("Location: asignados.php");  
    }
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Actualizar Asignación </h1>
            <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <!-- <li><a href="registrados.php"><i class="fa fa-th-list"></i> Tickets Registrados</a></li> -->
                <li class="active"><i class="fa fa-ticket"></i> Tickets </li> 
                <li class="active">Actualizar Asignación</li>
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
                            <h3 class="box-title">Actualizar Asignación</h3>
                        </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                        <form role="form" method="post" name="add" id="add">
                            <div class="box-body">
                                <div class="form-group">
                                  <label for="asigned_id">Empleado: </label>
                                  <select name="asigned_id" class="form-control" id="asigned_id" required>
                                      
                                        <?php
                                        $sql=mysqli_query($con, "select * from user where is_admin=0");
                                        while ($row=mysqli_fetch_array($sql)) {?>
                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name']." ".$row['lastname'] ?></option>
                                        
                                        <?php
                                    }
                                      ?>
                                  </select>
                                </div>
                            </div>
                                <input type="hidden" name="ticked_id" value="<?php echo $id ?>">
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
$( "#add" ).submit(function( event ) {
  $('#save_data').attr("disabled", true);
  
 var parametros = $(this).serialize();
     $.ajax({
            type: "POST",
            url: "action/addreasigned.php",
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