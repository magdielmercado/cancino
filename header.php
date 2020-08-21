<?php

    session_start();
    include "admin/config/config.php";
    if (!isset($_SESSION['user_id']) AND $_SESSION['user_id'] != 1) {
        header("location: index.php");
        exit;
        }

    $id=$_SESSION['user_id'];
    $query=mysqli_query($con,"SELECT * from clientes where id=$id");
    while ($row=mysqli_fetch_array($query)) {
        $business=$row['business'];
        $fullname=$row['fullname'];
        $email=$row['email'];
        $ruc=$row['ruc'];
  
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
    <meta charset="UTF-8">
    <title><?php echo $website ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
    <!-- favicon -->
    <link rel="shortcut icon" href="admin/images/<?php echo $favicon ?>" />

    <!-- Bootstrap 3.3.2 -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />  
    <!-- DATA TABLES -->
    <link href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Datepicker -->
    <link href="assets/plugins/datepicker/datepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- Chosen Select -->
    <link rel="stylesheet" type="text/css" href="assets/plugins/chosen/css/chosen.min.css" />
    <!-- Theme style -->
    <link href="assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link href="assets/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <style>
            .table_header{
                background-color: #004f87;
                color: #fff;
            }
        </style>
    

    <script language="javascript">
        function getkey(e)
        {
            if (window.event)
              return window.event.keyCode;
            else if (e)
              return e.which;
            else
              return null;
        }

        function goodchars(e, goods, field)
        {
            var key, keychar;
            key = getkey(e);
            if (key == null) return true;
           
            keychar = String.fromCharCode(key);
            keychar = keychar.toLowerCase();
            goods = goods.toLowerCase();
           
            // check goodkeys
            if (goods.indexOf(keychar) != -1)
                return true;
            // control keys
            if ( key==null || key==0 || key==8 || key==9 || key==27 )
              return true;
              
            if (key == 13) {
              var i;
              for (i = 0; i < field.form.elements.length; i++)
                if (field == field.form.elements[i])
                  break;
              i = (i + 1) % field.form.elements.length;
              field.form.elements[i].focus();
              return false;
            };
            // else return false
            return false;
        }
    </script>

  </head>
  <body class="skin-blue fixed sidebar-collapse">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="#" class="logo">
                  <img style="margin-top:-15px;margin-right:5px" src="assets/img/logo-blue.png" alt="Logo"> 
                  <span style="font-size:20px"><?php echo $website ?></span>
                </a>

                <nav class="navbar navbar-static-top" role="navigation">
                  <!-- Sidebar toggle button-->
                    <a style="display: none" href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">

                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="admin/images/default.png" class="user-image" alt="Cliente Image"/>
                                    <span class="hidden-xs"><?php echo $business ?> <i style="margin-left:5px" class="fa fa-angle-down"></i></span>
                                </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="admin/images/default.png" class="img-circle" alt="Cliente Image"/>
                                <p> <?php echo $business ?> <small>(Cliente)</small> </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a style="width:80px" data-toggle="modal" href="#logout" class="btn btn-default btn-flat">Salir</a>
                                    </div>
                                </li>
                            </ul>
                        </li>              
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">            
                <ul class="sidebar-menu">
                    <li class="header">MENU</li>
                   <li class="active">
                        <a href="tickets.php"><i class="fa fa-ticket"></i>Mis Tickets </a>
                    </li>
                </ul>
            </section><!-- /.sidebar -->
        </aside>