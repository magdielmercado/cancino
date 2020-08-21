<?php 

    $active14="active";
    include "header.php";
    include "sidebar.php";

if (isset($_GET['id']) && !empty($_GET['id'])){
        $id=intval($_GET["id"]);
    } else {
       print "<script>window.location='tickets.php?error'</script>";
    }

    //$id = intval($_GET['id']);
    $sql = mysqli_query($con, "select * from tickets where id=$id");
   $rows= mysqli_fetch_array($sql);
        $id_ticket= $rows['id'];
        $name= $rows['name'];
        $email= $rows['email'];
        $phone= $rows['phone'];
        $cell_phone= $rows['cell_phone'];
        $contact_schedule= $rows['contact_schedule'];
        $kind_id= $rows['kind_id'];
        $comment= $rows['comment'];
        $image= $rows['image'];
        $area= $rows['area'];
        $asunt= $rows['asunt'];
        $id_team= $rows['id_team'];
        $pass_team= $rows['pass_team'];
        $client_id= $rows['client_id'];
        $created_at= $rows['created_at'];
        $status_id= $rows['status_id'];
        $number_ticket= $rows['number_ticket'];
        $asigned_id= $rows['asigned_id'];
        $atendido= $rows['date_atendid'];
        $sistema= $rows['sistema'];
        $finalizado=$rows['finalizado'];
        $tipo_requerimiento=$rows['tipo_requerimiento'];
        $image=$rows['image'];
        $date_asigned=$rows['date_asigned'];
    


    if (mysqli_num_rows($sql)==0) {
       //header("location: tickets.php");
        print "<script>window.location='mistickets.php'</script>";
    }

    //tipo requerimiento
    //if ($tipo_requerimiento!=0) {
        $requerimientos=mysqli_query($con, "select * from tipos_requerimientos where id=$tipo_requerimiento");
        $rows=mysqli_fetch_array($requerimientos);
           $name_require=$rows['name'];
        
   // }   

    if ($asigned_id!=0) {
        $user_id=$asigned_id;
        $user=mysqli_query($con, "select * from user where id=$user_id");
        $row=mysqli_fetch_array($user);
           $name_user=$row['name'];
           $lastname_user=$row['lastname'];

        
    }

    $status=mysqli_query($con, "select * from status where id=$status_id");
    $rows=mysqli_fetch_array($status);
       $name_status=$rows['name'];
    

?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <section class="content-header">
            <!-- <h1>
              <i class="fa fa-edit icon-title"></i> Agregar Ticket
            </h1> -->
            <ol class="breadcrumb">
              <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard </a></li>
              <li class="active"> Detalles Ticket </li>
            </ol>
        </section>
        <?php if($is_admin!=1){?>
        <br><br>
        <a class="btn btn-default pull-right" href="mistickets.php"><i class="glyphicon glyphicon-arrow-left"></i> Regresar</a>
        <br><br>
        <?php } ?>
        <!-- Main content -->
        <section class="content">
            <?php if($is_admin==1){?>
            <!-- <div class="row">
                <div class="col-md-10">
                    <a href="tickets.php" class="btn btn-default  pull-right"><i class="glyphicon glyphicon-arrow-left"></i> Regresar</a>
                </div>
                <br>
                <br>
            </div> -->
            <?php } ?>
            <br>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="panel panel-danger col-md-3">
                    <div class="panel-heading">
                        <h3 class="panel-title">REGISTRADO</h3>
                    </div>
                    <div class="panel-body">
                        Contacto : <?php echo $name ?>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <?php if($asigned_id!=0){ ?>
                <div class="panel panel-warning col-md-3">
                    <div class="panel-heading">
                        <h3 class="panel-title">ASIGNADO</h3>
                    </div>
                    <div class="panel-body">
                        Asignado a: <?php echo $name_user." ".$lastname_user?>, el dia: <?php echo $date_asigned ?>
                    </div>
                </div>
                <?php }else{ ?>
                    <div class="panel panel-danger col-md-3">
                    <div class="panel-heading">
                        <h3 class="panel-title">ASIGNADO</h3>
                    </div>
                    <div class="panel-body">
                       Sin Asignar
                    </div>
                </div>
                <?php } ?>
            </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <?php if($sistema!=""){ ?>
                    <div class="panel panel-info col-md-3">
                        <div class="panel-heading">
                            <h3 class="panel-title">SISTEMA</h3>
                        </div>
                        <div class="panel-body">
                            <?php echo $sistema ?>
                        </div>
                    </div>
                    <?php }else{ ?>
                    <div class="panel panel-danger col-md-3">
                        <div class="panel-heading">
                            <h3 class="panel-title">SISTEMA</h3>
                        </div>
                        <div class="panel-body">
                            Sin actividad
                        </div>
                    </div>
                    <?php } ?>
                    <div class="col-md-2"></div>
                    <?php if($atendido!="0000-00-00 00:00:00"){ ?>
                    <div class="panel panel-success col-md-3">
                        <div class="panel-heading">
                            <h3 class="panel-title">ATENDIDO</h3>
                        </div>
                        <div class="panel-body">
                            Atendido el dia: <?php echo $atendido ?>
                        </div>
                    </div>
                    <?php }else{ ?>
                    <div class="panel panel-danger col-md-3">
                        <div class="panel-heading">
                            <h3 class="panel-title">ATENDIDO</h3>
                        </div>
                        <div class="panel-body">
                           Sin Antender
                        </div>
                    </div>
                    <?php } ?>
                </div>
                



            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="box box-success">
                        <!-- form start -->
                        <form role="form" class="form-horizontal" action="action/addticket.php" method="POST" enctype="multipart/form-data">
                            <div class="box-body">
                                <?php if($asunt!=""){ ?>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Asunto:
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $asunt ?>" readonly>
                                        </div>
                                    </div>
                                <?php }else{ 
                                    $kinds=mysqli_query($con, "select * from kind where id=$kind_id");
                                    if ($row=mysqli_fetch_array($kinds)) {
                                        $name_kind=$row['name'];
                                    }
                                ?>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Problema:
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $name_kind ?>" readonly>
                                        </div>
                                    </div>
                                <?php } ?>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Nombre de contacto:
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $name ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >E-mail de contacto:
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $email ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Canal de Entrada:
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo "Ticket"  ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Version y Modulo:
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo "2.0" ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Descripción:
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea class="form-control col-md-7 col-xs-12" readonly><?php echo  $comment ?></textarea>
                                        </div>
                                    </div>
                                    <h2>ASIGNACIÓN DEL REQUEMIENTOS</h2>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Tipo del Requerimiento Reportado:
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php if($tipo_requerimiento==0){?>
                                            <input type="text" class="form-control col-md-7 col-xs-12" value="" readonly>
                                        <?php }else{ ?> 
                                            <input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $name_require ?>" readonly>
                                        <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Analista Designado:
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php if($asigned_id==0){ ?>
                                            <input type="text"  class="form-control col-md-7 col-xs-12" value="Sin Asignar" readonly>
                                        <?php }else{ ?> 
                                            <input type="text"  class="form-control col-md-7 col-xs-12" value="<?php echo $name_user." ".$lastname_user ?>" readonly>
                                        <?php } ?>
                                        </div>
                                    </div>
                                     <h2>ATENCIÓN BRINDADA</h2>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Tipo de Atención:
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text"  class="form-control col-md-7 col-xs-12" value="<?php echo "SOPORTE" ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Detalle de la Atención
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                         <?php if($finalizado==""){?>
                                            <textarea  class="form-control col-md-7 col-xs-12" readonly><?php echo "EN ESPERA..." ?></textarea>
                                        <?php
                                        }else{
                                        ?> 
                                            <textarea style="color: red" class="alert alert-warning form-control col-md-7 col-xs-12" readonly><?php echo $finalizado ?></textarea>
                                        <?php
                                        }
                                        ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Descargar Adjunto:
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <!-- <input type="text"  class="form-control col-md-7 col-xs-12" value="<?php echo $image ?>" readonly> -->
                                           <!--  <p class="text-muted">Descargar</p> -->
                                           <?php if($image!=""){?>
                                            <a target="_blank" class="form-control col-md-7 col-xs-12" href="downloadfile.php?id=<?php echo $id_ticket ?>"><i class="fa fa-download"></i> <?php echo " ".$image ?></a>
                                            <?php }else{?>
                                                <input type="text"  class="form-control col-md-7 col-xs-12" value="<?php echo "Sin Archivo Adjunto" ?>" readonly>
                                            <?php }?>
                                        </div>
                                    </div>
                               </div>
                        </form>
                    </div><!-- /.box -->
                </div><!--/.col -->
            </div>   <!-- /.row -->
             <?php if($is_admin!=1){?>
            <div style="text-align: center;">
                <a class="btn btn-success" href="atender_ticket.php?id=<?php echo $id_ticket ?>"><i class="fa fa-check"></i> Finalizar Ticket</a>
                <a class="btn btn-danger" href="incidencias.php?id=<?php echo $id_ticket ?>"><i class="fa fa-ban"></i> Agregar Incidencía</a>
            </div>
            <?php } ?>
        </section><!-- /.content -->
    </div>
  <?php include "footer.php" ?>
