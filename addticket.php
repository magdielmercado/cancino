<?php 

    include "header.php";
    $kinds =mysqli_query($con, "select * from kind order by id desc");
    $areas =mysqli_query($con, "select * from area");
?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <section class="content-header">
            <h1><i class="fa fa-edit icon-title"></i> Agregar Ticket</h1>
            <ol class="breadcrumb">
                <li><a href="tickets.php"><i class="fa fa-ticket"></i> Tickets </a></li>
                <li class="active"> Nuevo Ticket </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <?php
                        if (isset($_GET)) {

                            if (isset($_GET['success'])) {
                                echo "<div class='alert alert-success' role='alert'><strong>Exito!</strong> Ticket Creado Con Exito</div>";
                            }
                            if (isset($_GET['error'])) {
                                 echo "<div class='alert alert-danger' role='alert'><strong>Error!</strong> El Ticket No Pudo Crearse!</div>";
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <a href="tickets.php" class="btn btn-default  pull-right"><i class="glyphicon glyphicon-arrow-left"></i> Regresar</a>
                </div>
                <br>
                <br>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="box box-success">
                        <!-- form start -->
                        <form role="form" class="form-horizontal" action="action/addticket.php" method="POST" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">E-mail <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Telefono Fijo <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Telefono Fijo"  required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone2">Celular <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" name="phone2" id="phone2" class="form-control" placeholder="Celular"  required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Horario de contacto<span class="required">*</span></label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                    <br>
                                      <p>
                                       
                                        <input type="radio" class="flat" name="contact" id="gender1" value="1" checked  required />  08:00am - 01:00pm
                                        <br>
                                        
                                        <input type="radio" class="flat" name="contact" id="gender2" value="2" /> 02:00pm - 06:00pm
                                      </p>
                                    </div>
                                </div>
                                <div class="form-group" style="display: none;" id="asunto">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="asunt">Asunto <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" name="asunt" id="asunt" class="form-control" placeholder="Asunto" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label col-md-3 col-sm-3 col-xs-12" for="kind_id">Problema <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select class="chosen-select form-control" name="kind_id"  id="kind_id" required data-placeholder="-- Seleccionar --" autocomplete="off">
                                              <?php foreach($kinds as $p):?>
                                                <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                              <?php endforeach; ?>
                                                <!-- <option value="0">Otro</option> -->
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label col-md-3 col-sm-3 col-xs-12" for="area">Area <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select class="chosen-select form-control" name="area"  id="area" required data-placeholder="-- Seleccionar --" autocomplete="off">
                                                <?php foreach($areas as $cat):?>
                                                <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>
                                                <?php endforeach; ?>
                                              
                                        </select>
                                    </div>
                                    </div>
                                <div class="form-group">
                                    <label for="comment" class="control-label col-md-3 col-sm-3 col-xs-12">Descripción <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <textarea name="comment" id="comment" class="form-control col-md-7 col-xs-12"  placeholder="Descripción" required></textarea>
                                    </div>
                                </div>
                                <br>
                                <p class="text-info text-center">Si usa teamviewer nos ayudara mucho que brinde sus datos:</p>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_team">ID de TeamViewer 
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" name="id_team" id="id_team" class="form-control" placeholder="ID de TeamViewer" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pass_team">Contraseña
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" name="pass_team" id="pass_team" class="form-control" placeholder="Contraseña de TeamViewer" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-md-3 control-label">Adjunto</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="image">
                                        <p class="text-muted">Peso Máximo 2MB</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-md-3 control-label"></label>
                                    <div class="col-sm-9">
                                        <input type="checkbox" name="terms" required> Acepto los terminos y condiciónes.
                                    </div>
                                    
                                </div>
                            </div><!-- /.box body -->
                            <div class="box-footer">
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" class="btn btn-success btn-submit" name="token" value="Guardar">
                                        <a href="tickets.php" class="btn btn-default btn-reset">Cancelar</a>
                                    </div>
                                </div>
                            </div><!-- /.box footer -->
                        </form>
                    </div><!-- /.box -->
                </div><!--/.col -->
            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </div>
    <?php include "footer.php" ?>
<script>
    //funcion para el tipo de persona (nuevo cliente)
    $(function(){
    $("select[name=kind_id]").change(function(){
        if($('select[name=kind_id]').val()==1){
          //  $("#juridica").css("display","none");//ocultamos el inpput
            $("#asunto").css("display","block");//mostramos el inpput
            //$('input[name=natural]').val($(this).val());

        }
        if($('select[name=kind_id]').val()!=1){
          //  $("#juridica").css("display","block"); //mostramos el inpput
            $("#asunto").css("display","none"); //ocultamos el inpput
          //  $('input[name=juridica]').val($(this).val());

        }
    });
    })
</script>