<?php 

    $active2="active";
    $active4="active";
    include "header.php";
    include "sidebar.php";
    if($is_admin!=1){
        //header("location: dashboard.php");
        print "<script>window.location='dashboard.php?error';</script>";
    }
    $atendidos=mysqli_query($con, "select * from tickets where status_id=4  order by id desc");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Tickets Atendidos</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Tickets Atendidos</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

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
                                    <!-- <th></th> -->
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                foreach($atendidos as $cat):
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
                                    <td><?php echo "<span class='label label-success'>Atendido</span>
                                                "; ?>
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