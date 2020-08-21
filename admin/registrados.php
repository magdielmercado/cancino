<?php 

    $active2="active";
    $active3="active";
    include "header.php";
    include "sidebar.php";

    if($is_admin!=1){
        //header("location: dashboard.php");
        print "<script>window.location='dashboard.php?error';</script>";
    }
    
    $registrados=mysqli_query($con, "select * from tickets where status_id=1  order by id desc");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Tickets Registrados</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Tickets Registrados</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
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
                      <!-- <h3 class="box-title">Registro de tickets</h3> -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="table_header">
                                <tr>
                                    <th></th>
                                    <th>Nombre</th>
                                    <th>E-mail</th>
                                    <th>N° Ticket</th>
                                    <th>Asunto</th>
                                    <th>Empresa</th>
                                    <th>Estado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                foreach($registrados as $cat):
                                    $status_id=$cat['status_id'];
                                $client_id=$cat['client_id'];

                                $kind_id=$cat['kind_id'];
                                $sql=mysqli_query($con, "select * from kind where id=$kind_id");
                                $row=mysqli_fetch_array($sql);
                                    $name_kind=$row['name'];
                                

                                $empresa=mysqli_query($con, "select * from clientes where id=$client_id");
                                $rows=mysqli_fetch_array($empresa);
                                    $business=$rows['business'];
                                
                            ?>
                                <tr>
                                    <td width='30' class='center'><a class="btn btn-default btn-xs" href="ticket_detail.php?id=<?php echo $cat['id'] ?>">Ver <span class="glyphicon glyphicon-arrow-right"></span></a></td>
                                    <td><?php echo $cat['name'] ?></td>
                                    <td><?php echo $cat['email'] ?></td>
                                    <td><?php echo $cat['number_ticket'] ?></td>
                                    <td><?php echo $name_kind ?></td>
                                    <td><a href="#"><?php echo $business ?></a></td>
                                    <td><?php echo"<span class='label label-warning'>Registrado</span>" ?></td>
                                    <td style="text-align: center;">
                                        <!-- Split button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default">Acción</button>
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="asignar_ticket.php?id=<?php echo $cat['id'] ?>"><i class="fa fa-child"></i> Asignar</a></li>
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
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

  <?php include "footer.php" ?>