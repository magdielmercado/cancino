<?php 

    $active10="active";
    include "header.php";
    include "sidebar.php";

    $clientes=mysqli_query($con, "select * from cliente");
    
    if($is_admin!=1){
        //header("location: dashboard.php");
        print "<script>window.location='dashboard.php?error';</script>";
    }
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Clientes</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Clientes</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <a class="btn btn-default pull-right" href="nuevo_cliente.php"><i class='fa fa-plus'></i> Nuevo</a>
                    <br><br>
                <?php 

                        if (isset($_GET)) {
                           if (isset($_GET['deletesuccess'])) {
                              echo "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Datos Eliminado Correctamente!</div>";
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
                                    <th>RFC Cliente</th>
                                    <th>Nombre del  cliente</th>
                                    <th>Contacto del cliente</th>
                                    <th>Telefono cliente</th>
                                    <th>Correo Electrónico</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                foreach($clientes as $cliente):
                                    $rfccliente=$cliente['rfccliente'];
                                    //$tickets=mysqli_query($con, "select * from tickets where client_id=$rfccliente");
                            ?>
                                <tr>
                                    <td><?php echo $cliente['rfccliente'] ?></td>
                                    <td><?php echo $cliente['nombrecliente'] ?></td>
                                    <td><?php echo $cliente['contactocliente'] ?></td>
                                    <td><?php echo $cliente['telefonocliente'] ?></td>
                                    <td><?php echo $cliente['correocliente'] ?></td>
                                    <td style="text-align: center;">
                                        <!-- Split button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default">Acción</button>
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="editar_cliente.php?rfccliente=<?php echo $cliente['rfccliente'] ?>"><i class="fa fa-pencil"></i> Editar</a></li>
                                                <li><a href="action/delclient.php?rfccliente=<?php echo $cliente['rfccliente'] ?>"><i class="fa fa-trash"></i> Eliminar</a></li>
                                                <!--
                                                <?php
                                                    //uso esta coondicion para evitar errores y solo imprimir los que tengan tickets abiertos 
                                                    //if(mysqli_num_rows($tickets)>0): ?>
                                                <li><a target="_blank" href="reportes/exportar_cliente.php?id=<?php echo $cliente['rfccliente'] ?>"><i class="fa fa-download"></i> Descargar</a></li>
                                                <?php //endif; ?>
                                                -->
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>    
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->

<?php include "footer.php" ?>