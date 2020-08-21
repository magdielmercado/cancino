<?php  

    include "header.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content-header">
  <h1>
    <i class="fa fa-ticket icon-title"></i> Mis Tickets

    <a class="btn btn-success btn-social pull-right" href="addticket.php" title="Agregar Ticket" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Abrir Ticket
    </a>
  </h1>
  <br>

</section>
  <section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-body table-responsive">
                    <table id="dataTables1" class="table table-bordered table-striped table-hover">
                        <thead class="table_header">
                            <tr>
                                <th class="center">Detalle.</th>
                                <th class="center">N° Ticket</th>
                                <th class="center">Fecha -  Hora </th>
                                <th class="center">Asunto</th>
                                <th class="center">Requerimiento</th>
                                <th class="center">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $client_id=$_SESSION['user_id'];

                            $sql = mysqli_query($con, "SELECT * FROM tickets where client_id=$client_id order by id desc");
                            foreach($sql as $client){
                                $kind_id=$client['kind_id'];
                                $status_id=$client['status_id'];

                                $sql = mysqli_query($con, "select * from kind where id=$kind_id");
                           $c=mysqli_fetch_array($sql);
                                $name_kind=$c['name'];
                            
                        ?>
                            <tr>
                                <td width='30' class='center'><a class="btn btn-default btn-xs" href="ticket_detail.php?id=<?php echo $client['id'] ?>">Ver <span class="glyphicon glyphicon-arrow-right"></span></a></td>
                                <td width='80' class='center'><?php echo $client['number_ticket'];?></td>
                                <td width='180' align="center"><?php echo $client['created_at'] ?></td>
                                <td width='100' align='center'><?php echo $name_kind; ?></td>
                                <td width='100' align='left'>
                                    <?php echo substr($client['comment'],0,25);?>
                                </td>
                                <td class='center' width='80'>
                                    <div>
                                        <?php  

                                        if($status_id==1){
                                            echo"<p style='padding:3px; margin-bottom:0' class='alert alert-warning'>Registrado</p>";
                                            
                                        }else if($status_id==2){
                                            echo "<p style='padding:3px; margin-bottom:0' class='alert alert-info'>Asignado</p>";
                                        }else if($status_id==3){
                                            echo "<p style='padding:3px; margin-bottom:0' class='alert alert-danger'>Con Incidencia</p>
                                            ";
                                        }else{
                                            echo "<p style='padding:3px; margin-bottom:0' class='alert alert-success'>Atendido</p>";
                                        }

                                    ?>
                                    </div>
                                </td>
                            </tr>
                    <?php
                        } //en while
                    ?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!--/.col -->
    </div>   <!-- /.row -->
</section><!-- /.content-->

      </div><!-- /.content-wrapper -->

<?php include "footer.php" ?>