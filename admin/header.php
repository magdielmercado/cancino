<?php

    session_start();
    include "config/config.php";
    if (!isset($_SESSION['admin_id']) AND $_SESSION['admin_id'] != 1) {
        header("location: index.php");
        exit;
        }
?>
<?php 
    $idusuario=$_SESSION['admin_id'];
    $sql = "SELECT * 
              FROM usuario u
        INNER JOIN puesto p
                ON u.idpuesto = p.idpuesto
             WHERE idusuario=$idusuario;";
    $query=mysqli_query($con, $sql);
    while ($row=mysqli_fetch_array($query)) {
        $usuario = $row['usuario'];
        $nombreusuario = $row['nombreusuario'];
        $is_admin = $row['idpuesto'];
        $idpuesto = $row['idpuesto'];
        $nombrepuesto = $row['nombrepuesto'];
        $fotousuario = $row['fotousuario'];
    }

    $config = mysqli_query($con, "select * from configuration where name='website' ");
    while($row=mysqli_fetch_array($config)){
        $website=$row['val'];
    }

    $fav = mysqli_query($con, "select * from configuration where name='favicon' ");
    while($row=mysqli_fetch_array($fav)){
        $favicon=$row['val'];
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="images/<?php echo $favicon ?>" />
    <title><?php echo $website ?> | <?php echo $usuario?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bootstrap/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- DataTables -->
    <!-- <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css"> -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="dist/css/micss.css">
    <style>
        .table_header{
           background-color: #00A65A;
           color:#fff;
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P</b>ro</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?php echo $website ?></b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">


          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="images/profiles/<?php echo $fotousuario ?>" class="user-image" alt="User">
              <span class="hidden-xs"><?php echo $usuario ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="images/profiles/<?php echo $fotousuario ?>" class="img-circle" alt="Usuario">
                <p>
                  <?php 
                     echo $nombreusuario;
                     if ($is_admin==1) {
                       echo " (Director)";
                     } else if ($is_admin==2) {
                        echo " (Gerente)";
                     } else if ($is_admin==3) {
                        echo " (Subgerente)";
                     } else if ($is_admin==4) {
                        echo " (Contador)";
                     } else if ($is_admin==5) {
                        echo " (Colabrador)";
                     }
                  ?>
                  
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="action/logout.php" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>

    </nav>
  </header>