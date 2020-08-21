<?php

    $active1="active";
    include "header.php";
    include "sidebar.php";
    $registrados=mysqli_query($con, "select * from tickets where status_id=1");
    $asignados=mysqli_query($con, "select * from tickets where status_id=2 && asigned_id!=0");
    $cancelados=mysqli_query($con, "select * from tickets where status_id=3");
    $atendidos=mysqli_query($con, "select * from tickets where status_id=4");


    $sesion_id=$_SESSION['admin_id'];
//registro empleados
    $registrados_emp=mysqli_query($con, "select * from tickets where status_id=1 && asigned_id=$sesion_id");
    $asignados_emp=mysqli_query($con, "select * from tickets where status_id=2 && asigned_id!=0 && asigned_id=$sesion_id");
    $cancelados_emp=mysqli_query($con, "select * from tickets where status_id=3 && asigned_id=$sesion_id");
    $atendidos_emp=mysqli_query($con, "select * from tickets where status_id=4 && asigned_id=$sesion_id");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Panel de control
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Panel de control</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <?php if($is_admin==1){?>
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
          <a href="registrados.php">
            <span class="info-box-icon bg-aqua"><i class="fa fa-glass"></i></span>

            </a>
            <div class="info-box-content">
              <span class="info-box-text">Registrados</span>
              <span class="info-box-number"><?php echo mysqli_num_rows($registrados) ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->



        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
          <a href="asignados.php">
            <span class="info-box-icon bg-green"><i class="fa fa-rocket"></i></span>
        </a>
            <div class="info-box-content">
              <span class="info-box-text">Asignados</span>
              <span class="info-box-number"><?php echo mysqli_num_rows($asignados) ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
          <a href="cancelados.php">
            <span class="info-box-icon bg-yellow"><i class="fa fa-ban"></i></span>
            </a>
            <div class="info-box-content">
              <span class="info-box-text">Con Incidencía</span>
              <span class="info-box-number"><?php echo mysqli_num_rows($cancelados) ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
          <a href="atendidos.php">
            <span class="info-box-icon bg-red"><i class="fa fa-flask"></i></span>
        </a>
            <div class="info-box-content">
              <span class="info-box-text">Atendidos</span>
              <span class="info-box-number"><?php echo mysqli_num_rows($atendidos) ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
<?php }  ?> 

<!-- empleado -->


      <!-- Info boxes -->
      <?php if($is_admin!=1){?>
      <div class="row">

     
            <div class="col-md-12">
            <?php if(isset($_GET['error'])) {
                    // echo "<br><div class='alert alert-warning' role='alert'>
                    // <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    // <strong>¡Error!</strong> Estas accediendo a una area restringida!
                    // </div>";
            } ?> 
            </div>
    

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
          <a href="asignados.php">
            <span class="info-box-icon bg-green"><i class="fa fa-rocket"></i></span>
        </a>
            <div class="info-box-content">
              <span class="info-box-text">Asignados</span>
              <span class="info-box-number"><?php echo mysqli_num_rows($asignados_emp) ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
          <a href="cancelados.php">
            <span class="info-box-icon bg-yellow"><i class="fa fa-ban"></i></span>
            </a>
            <div class="info-box-content">
              <span class="info-box-text">Con Incidencía</span>
              <span class="info-box-number"><?php echo mysqli_num_rows($cancelados_emp) ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
          <a href="atendidos.php">
            <span class="info-box-icon bg-red"><i class="fa fa-flask"></i></span>
        </a>
            <div class="info-box-content">
              <span class="info-box-text">Atendidos</span>
              <span class="info-box-number"><?php echo mysqli_num_rows($atendidos_emp) ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
<?php }  ?> 


<!-- end empleado -->

<?php if($is_admin==1){?>
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">

              <?php 
              $sql = mysqli_query($con, "SELECT * from tickets order by id desc limit 10 ");
              if (mysqli_num_rows($sql)>0) {
                  # code...
              
              ?>

          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Tickets Recientes</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin table-bordered">
                  <thead class="table_header">
                  <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Empresa</th>
                    <th>Requerimientos</th>
                    <th>Estado</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                        foreach ($sql as $result): 
                        $client_id=$result['client_id'];
                        $empresas=mysqli_query($con, "select * from clientes where id=$client_id");

                        $status_id=$result['status_id'];
                        $statuses=mysqli_query($con, "select * from status where id=$status_id");
                  ?>
                  <tr>
                    <td><a href="ticket_detail.php?id=<?php echo $result['id'] ?>"><?php echo $result['number_ticket'] ?></a></td>
                    <td><?php echo $result['name']." (<b>".$result['email']."</b>)";?></td>
                    <?php foreach ($empresas as $cat): ?>
                    <td><span class="label label-success"><?php echo $cat['business'] ?></span></td>
                    <?php endforeach; ?>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo substr($result['comment'],0,45) ?></div>
                    </td>
                     <td>   
                        <?php
                            if($result['status_id']==1){
                                echo "<span class='label label-warning'>Registrado</span>";
                            }else if($result['status_id']==2){
                                echo "<span class='label label-info'>Asignado</span>";
                            }else if($result['status_id']==3){
                                echo "<span class='label label-danger'>Con Incidencia</span>";
                            }else if($result['status_id']==4){
                                echo "<span class='label label-success'>Atendido</span>";
                            }
                        ?>
                     </td>
                  </tr>
              <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
                        <?php

                    }else{
                        //echo "<p class='aler alert-info'>Aun no hay tickets!</p>";
                    }

                 ?>
      </div>
      <!-- /.row -->

        <?php } ?>

<!-- empleado -->
  
  <?php if($is_admin!=1){?>
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">

              <?php 
              $sql = mysqli_query($con, "SELECT * from tickets where asigned_id=$sesion_id order by id desc limit 10");
              if (mysqli_num_rows($sql)>0) {
                  # code...
              
              ?>

          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Tickets Recientes</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin table-bordered">
                  <thead class="table_header">
                  <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Empresa</th>
                    <th>Requerimientos</th>
                    <th>Estado</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                        foreach ($sql as $result): 
                        $client_id=$result['client_id'];
                        $empresas=mysqli_query($con, "select * from clientes where id=$client_id");

                        $status_id=$result['status_id'];
                        $statuses=mysqli_query($con, "select * from status where id=$status_id");
                  ?>
                  <tr>
                    <td><a href="ticket_detail.php?id=<?php echo $result['id'] ?>"><?php echo $result['number_ticket'] ?></a></td>
                    <td><?php echo $result['name']." (<b>".$result['email']."</b>)";?></td>
                    <?php foreach ($empresas as $cat): ?>
                    <td><span class="label label-success"><?php echo $cat['business'] ?></span></td>
                    <?php endforeach; ?>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo substr($result['comment'],0,45) ?></div>
                    </td>
                     <td>   
                        <?php
                            if($result['status_id']==1){
                                echo "<span class='label label-warning'>Registrado</span>";
                            }else if($result['status_id']==2){
                                echo "<span class='label label-info'>Asignado</span>";
                            }else if($result['status_id']==3){
                                echo "<span class='label label-danger'>Con Incidencia</span>";
                            }else if($result['status_id']==4){
                                echo "<span class='label label-success'>Atendido</span>";
                            }
                        ?>
                     </td>
                  </tr>
              <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
                        <?php

                    }else{
                        //echo "<p class='aler alert-info'>Aun no hay tickets!</p>";
                    }

                 ?>
      </div>
      <!-- /.row -->

        <?php } ?>


<!-- end empleado -->
        



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include "footer.php" ?>