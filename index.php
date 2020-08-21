<?php

    session_start();

    include "admin/config/config.php";
    if (isset($_SESSION['user_id']) AND $_SESSION['user_id'] == 1) {
        header("location: tickets.php");
        exit;
    }
        
    $config = mysqli_query($con, "select * from configuration where name='website' ");
   $row=mysqli_fetch_array($config);
        $website=$row['val'];
    

    $fav = mysqli_query($con, "select * from configuration where name='favicon' ");
   $row=mysqli_fetch_array($fav);
        $favicon=$row['val'];
    

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $website ?> | Cancino Hidalgo</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


    <link rel="shortcut icon" href="admin/images/<?php echo $favicon ?>" />

    <!-- Bootstrap 3.3.2 -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="assets/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

  </head>
  <body class="login-page bg-login">
    <div class="login-box">
      <div style="color:#3c8dbc" class="login-logo">
        <img style="margin-top:-12px" src="assets/img/logo-blue.png" alt="Logo" height="70" width="300"> 
      </div><!-- /.login-logo -->
      
      <div class="login-box-body">
        <?php 
            $invalid=sha1(md5("contrasena y ruc invalido"));
            if (isset($_GET['invalid']) && $_GET['invalid']==$invalid) {
                echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <strong>Error!</strong> RUC invalido
                    </div>";
            }
              $ban=sha1(md5("la cuenta fue baneada"));
             if (isset($_GET['ban']) && $_GET['ban']==$ban) {
                echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <strong>Error!</strong> Lo sentimos la cuenta fue baneada, contacte al administrador.
                    </div>";
            }
        ?>
            <p class="login-box-msg"><i class="fa fa-user icon-title"></i> Iniciar Sesión</p>
            <br/>
            <form action="action/login.php" method="post">
                <div class="form-group has-feedback">
                    <input type="ruc" class="form-control" name="ruc" placeholder="RUC" required />
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <br/>
                <div class="row">
                    <div class="col-xs-12">
                    <input type="submit" class="btn btn-primary btn-lg btn-block btn-flat" name="token" value="Ingresar" />
                    </div><!-- /.col -->
                </div>
            </form>
        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

  </body>
</html>