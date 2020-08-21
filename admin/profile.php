<?php 

    include "header.php";
    include "sidebar.php" 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Perfil
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Perfil</li>
      </ol>
      <br>
    </section>
    
            <div class="row"><!-- .row -->
            <div class="col-md-12">

            <div class="col-md-1"></div>
                <div class="col-md-3">
                    <!-- <div class="image view view-first">
                        <img class="thumb-image" style="width: 100%; display: block;" src="images/profiles/<?php echo $profile_pic ?>"" alt="image">
                    </div> -->
                    <!-- Profile Image -->
                        <div class="box box-success">
                            <div class="box-body box-profile">
                            <div id="load_img">
                                <img class="img-responsive" width="100%" src="images/profiles/<?php echo $fotousuario ?>" alt="Imagen de Perfil">
                                </div>
                                <h3 class="profile-username text-center"><?php echo $usuario." ".$nombreusuario;?></h3>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    <span class="btn btn-info btn-file" style="width: 100%; margin-top: 5px;">
                        <form method="post" id="formulario" enctype="multipart/form-data">
                            Cambiar Imagen de perfil<input type="file" name="file">
                        </form>
                    </span>
                    <div id="respuesta"></div><br>
                </div> 
                <div class="col-md-1"></div>
                <div class="col-md-6">
            <?php 
                    if (isset($_GET)) {
                       if (isset($_GET['success'])) {
                          echo "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Datos Actualizados Correctamente!</div>";
                       }
                       if (isset($_GET['success_pass'])) {
                          echo "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Contraseña Actualizada Correctamente!</div>";
                       }
                       if (isset($_GET['invalid'])) {
                          echo "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>La contraseña no coincide con la anterior!</div>";
                       }
                       if (isset($_GET['error'])) {
                          echo "<div class='alert alert-warning' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Error, no se actualizaron los datos</div>";
                       }
                       if (isset($_GET['errorcontrasena'])) {
                          echo "<div class='alert alert-warning' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Las contraseñas no coinciden.!</div>";
                       }
                        if (isset($_GET['errorpermisos'])) {
                          echo "<div class='alert alert-warning' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>El usuario no tienen permisos para modificar su perfil</div>";
                       }


                    } ?>
                    <div class="box box-success"><!-- general form elements -->
                        <div class="box-header with-border">
                            <h3 class="box-title">Datos Personales</h3>
                        </div> <!-- /.box-header -->
                        <?php if($is_admin==1){?>
                        <form role="form" method="post" action="action/updprofile.php" ><!-- form start -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="usuario">Usuario</label>
                                    <input name="usuario" type="text" class="form-control" id="usuario" value="<?php echo $usuario; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Nombre de usuario</label>
                                    <input name="nombreusuario" type="text" class="form-control" id="nombre" value="<?php echo $nombreusuario; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="puesto">Puesto</label>
                                    <input name="puesto" type="text" class="form-control" disabled="True" id="puesto" value="<?php echo $nombrepuesto; ?>">
                                    <input name="idpuesto" type="hidden" class="form-control" id="idpuesto" value="<?php echo $idpuesto; ?>">
                                       
                                </div>
                                <div class="form-group">
                                    <label for="new_password">Nueva Contraseña</label>
                                    <input name="contrasena" type="password" class="form-control" id="contrasea">
                                </div>
                                <div class="form-group">
                                    <label for="confirm_new_password">Confirmar Nueva Contraseña</label>
                                    <input name="confirmarcontrasena" type="password" class="form-control" id="confirmarcontrasena">
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button name="token" type="submit" class="btn btn-success">Actualizar Datos</button>
                            </div>
                        </form>
                        <?php } ?>
                       <!-- <?php if($is_admin!=1){?>
                        <form role="form" method="post" action="action/updprofileemp.php" >
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="usuario">Nombre Usuario:</label>
                                    <input name="usuario" type="text" class="form-control" id="usuario" value="<?php echo $usuario ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input name="nombreusario" type="text" class="form-control" id="nombre" value="<?php echo $nombreusuario ?>">
                                </div>

                                <div class="form-group">
                                    <label for="password">Contraseña Actual</label>
                                    <input name="contrasena" type="password" class="form-control" id="password" placeholder="*******">
                                </div>
                                <div class="form-group">
                                    <label for="new_password">Nueva Contraseña</label>
                                    <input name="nuevacontrasena" type="password" class="form-control" id="new_password">
                                </div>
                                <div class="form-group">
                                    <label for="confirm_new_password">Confirmar Nueva Contraseña</label>
                                    <input name="confirmarcontrasena" type="password" class="form-control" id="confirm_new_password">
                                </div>
                            </div><!-- /.box-body 
                            <div class="box-footer">
                                <button name="token" type="submit" class="btn btn-success">Actualizar Datos</button>
                            </div>
                        </form>
                        <?php } ?> -->
                    </div><!-- /.box -->
                </div>
                <div class="col-md-1"></div>
                </div>
            </div><!-- /.row -->
        </section>
    </div><!-- /.content -->
<?php include "footer.php"; ?>

 <script>
    $(function(){
    $("input[name='file']").on("change", function(){
        var formData = new FormData($("#formulario")[0]);
        var ruta = "action/upload-profile.php";
         idusuario= $.trim($('#idusuario').val());
        $.ajax({
            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos)
            {
                $("#respuesta").html(datos);
            }
        });
    });
    });
</script>