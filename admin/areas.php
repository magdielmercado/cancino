<?php 

    $active7="active";
    include "header.php";
    include "sidebar.php";

    $areas=mysqli_query($con, "select * from area ");
    
    if($is_admin!=1){
        //header("location: dashboard.php");
        print "<script>window.location='dashboard.php?error';</script>";
    }
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Areas</h1>
            <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Areas</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <a class="btn btn-default pull-right" href="nueva_area.php"><i class='fa fa-plus'></i> Nueva</a>
                    <br><br>
                    <?php 

                        if (isset($_GET)) {
                           if (isset($_GET['deletesuccess'])) {
                              echo "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Datos Eliminados Correctamente!</div>";
                           }
                           if (isset($_GET['errordelete'])) {
                              echo "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Hubo un error al eliminar los datos!</div>";
                           }
                        }

                    ?>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Registro de clientes</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead class="table_header">
                                    <tr>
                                        <th>#ID</th>
                                        <th>Nombre</th>
                                        <th>Fecha / Hora</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    foreach($areas as $area):
                                ?>
                                    <tr>
                                        <td><?php echo $area['id'] ?></td>
                                        <td><?php echo $area['name'] ?></td>
                                        <td><?php echo $area['created_at'] ?></td>
                                        <td style="text-align: center;">
                                            <!-- Split button -->
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default">Acción</button>
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="editar_area.php?id=<?php echo $area['id'] ?>"><i class="fa fa-pencil"></i> Editar</a></li>
                                                    <li><a href="action/delarea.php?id=<?php echo $area['id'] ?>"><i class="fa fa-trash"></i> Eliminar</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>    
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

  <?php include "footer.php" ?>