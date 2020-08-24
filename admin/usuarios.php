<?php 

    $active11="active";
    include "header.php";
    include "sidebar.php";
    $sql = "select * from usuario u inner join puesto p on u.idpuesto = p.idpuesto";
    $usuarios=mysqli_query($con, $sql);
    
    if($is_admin!=1){
        //header("location: dashboard.php");
        print "<script>window.location='dashboard.php?error';</script>";
    }
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Usuarios</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Panel de Control</a></li>
            <li class="active">Usuarios1</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <a class="btn btn-default pull-right" href="nuevo_usuario.php"><i class='fa fa-plus'></i> Nuevo</a>
                <br><br>
                 <?php 
                        if (isset($_GET)) {
                              if (isset($_GET['addsuccess'])) {
                              echo "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Usuario fue agregado correctamente!</div>";
                           }
                           if (isset($_GET['deletesuccess'])) {
                              echo "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Usuario eliminado correctamente!</div>";
                           }
                           else if (isset($_GET['errordelete'])) {
                              echo "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Hubo un error al eliminar los datos!</div>";
                           }
                           if (isset($_GET['updatesuccess'])) {
                              echo "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Usuario actualizado correctamente!</div>";
                           }
                        }

                    ?>
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Registro de usuarios</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="table_header">
                                <tr>
                                    <th>ID Usuario</th>
                                    <th>Usuario</th>
                                    <th>Contraseña</th>
                                    <th>Nombre de Usuario</th>
                                    <th>Puesto</th>
                        <!--            <th>ID Puesto</th>      -->
                                    <th>Foto</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                foreach($usuarios as $user):
                            ?>
                                <tr>
                                    <td><?php echo $user['idusuario'] ?></td>
                                    <td><?php echo $user['usuario'] ?></td>
                                    <td><?php echo $user['contrasena'] ?></td>
                                    <td><?php echo $user['nombreusuario'] ?></td>
                                    <td><?php echo $user['nombrepuesto'] ?></td>
                                    <!-- <td><?php echo $user['idpuesto'] ?></td>  --->
                                    <td> <?php echo "<img src='images/profiles/".$user['usuario'].".jpg' width='80'>"?></td>  
                                    <td style="text-align: center">

                                        <!-- Split button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default">Acción</button>
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="editar_usuario.php?idusuario=<?php echo $user['idusuario'] ?>"><i class="fa fa-pencil"></i> Editar</a></li>
                                                <li><a href="action/deluser.php?idusuario=<?php echo $user['idusuario'] ?>"><i class="fa fa-trash"></i> Eliminar</a></li>
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