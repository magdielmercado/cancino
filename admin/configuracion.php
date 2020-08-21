<?php

    $active12="active";
    include "header.php";
    include "sidebar.php";

    if($is_admin!=1){
        //header("location: dashboard.php");
        print "<script>window.location='dashboard.php?error';</script>";
    }

   $configuration = mysqli_query($con, "select * from configuration");

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Configuración</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Configuración</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-xs-12 col-md-8">
                <?php 
                    if (isset($_GET['succes'])){
                        ?>
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>¡Bien hecho!</strong> Datos actualizados correctamente. 
                    </div>      
                        <?php
                    }
                ?>
                <!-- general form elements -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <!-- <h3 class="box-title">Nueva Area</h3> -->
                    </div><!-- /.box-header -->
                    <div class="box-body with-border">
                        <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="action/updconfig.php"><!-- form start -->
                            <?php if(mysqli_num_rows($configuration)>0){
                                foreach($configuration as $cat){
                                    if ($cat['name']=="favicon") {
                                        $logo=$cat['val'];
                                    }
                                    if($cat['name']=="website"){
                            ?>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-2 col-xs-12" for="first-name"><?php echo $cat['label']?></label>
                                <div class="col-md-8 col-sm-10 col-xs-12">
                                    <input type="text" id="first-name" name="<?php echo $cat['name']; ?>" class="form-control col-md-7 col-xs-12" value="<?php echo $cat['val'];?>">
                                </div>
                            </div>
                            <?php 
                                } if($cat['name']=="email"){
                            ?>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-2 col-xs-12" for="first-name"><?php echo $cat['label']?></label>
                                    <div class="col-md-8 col-sm-10 col-xs-12">
                                        <input type="text" id="first-name" name="<?php echo $cat['name']; ?>" class="form-control col-md-7 col-xs-12" value="<?php echo $cat['val'];?>">
                                    </div>
                                </div>
                            <?php 
                                } if($cat['name']=="url_base"){
                            ?>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-2 col-xs-12" for="first-name"><?php echo $cat['label']?></label>
                                    <div class="col-md-8 col-sm-10 col-xs-12">
                                        <input type="text" id="first-name" name="<?php echo $cat['name']; ?>" class="form-control col-md-7 col-xs-12" value="<?php echo $cat['val'];?>">
                                    </div>
                                </div>
                                <?php }  } //end foreach?>
                            <?php } //end if ?>    
                            <div class="box-footer">
                                <button name="token" type="submit" class="btn btn-success">Actualizar</button>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
            
        </div> 
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-xs-12 col-md-4">
                <br><br>
                <!-- general form elements -->
                <!-- <div class="box box-success"> -->
                    <div class="box-header with-border">
                        <!-- <h3 class="box-title">Nueva Area</h3> -->
                    </div>
                    <!-- <div class="box-body"> -->
                        <div class="image view view-first text-center">
                            <img class="thumb-image" style="display: inline-block;" src="images/<?php echo $logo ?>" alt="Favicon Image">
                        </div>
                        <span class="btn btn-my-button btn-file" style="width: 345px; margin-top: 5px;">
                            <form method="post" id="formulario" enctype="multipart/form-data">
                                Cambiar Imagen de Favicon: <input type="file" name="file">
                            </form>
                        </span>
                        <div id="respuesta"></div>
                        <br>
                    <!-- </div> -->
                <!-- </div> --><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php include "footer.php" ?>

<script>
    $(function(){
    $("input[name='file']").on("change", function(){
        var formData = new FormData($("#formulario")[0]);
        var ruta = "action/updsetting.php";
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