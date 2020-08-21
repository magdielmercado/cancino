
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="images/profiles/<?php echo $fotousuario ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $usuario ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU</li>
        <li class="<?php if(isset($active1)){echo $active1;}?>">
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>


        <?php if($is_admin==1){?>
        <li class="treeview <?php if(isset($active2)){echo $active2;}?>">
          <a href="#">
            <i class="fa fa-ticket"></i> <span>TICKETS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(isset($active3)){echo $active3;}?>"><a href="registrados.php"><i class="fa fa-circle-o"></i> Tickets Registrados</a></li>
            <li class="<?php if(isset($active5)){echo $active5;}?>"><a href="asignados.php"><i class="fa fa-circle-o"></i> Tickets Asignados</a></li>
            <li class="<?php if(isset($active6)){echo $active6;}?>"><a href="cancelados.php"><i class="fa fa-circle-o"></i> Tickets Con Incidencia</a></li>
            <li class="<?php if(isset($active4)){echo $active4;}?>"><a href="atendidos.php"><i class="fa fa-circle-o"></i> Tickets Atendidos</a></li>
          </ul>
        </li>
        <?php } ?>


      <?php if($is_admin!=1){?>
        <li class="<?php if(isset($active14)){echo $active14;}?>">
          <a href="mistickets.php">
            <i class="fa fa-ticket"></i> <span>Mis Tickets</span>
          </a>
        </li>
      <?php } ?>
<?php if($is_admin==1){?>
        <li class="<?php if(isset($active7)){echo $active7;}?>">
          <a href="areas.php">
            <i class="fa fa-th-list"></i> <span>Areas</span>
          </a>
        </li>

        <li class="<?php if(isset($active13)){echo $active13;}?>">
          <a href="tipos_requerimientos.php">
            <i class="fa fa-bars"></i> <span>Tipos De Requerimientos</span>
          </a>
        </li>

        <li class="<?php if(isset($active8)){echo $active8;}?>">
          <a href="problemas.php">
            <i class="fa fa-th"></i> <span>Problemas</span>
          </a>
        </li>
        <li class="<?php if(isset($active9)){echo $active9;}?>">
          <a href="reportes.php">
            <i class="fa fa-area-chart"></i> <span>Reportes</span>
          </a>
        </li>

        <li class="<?php if(isset($active10)){echo $active10;}?>">
          <a href="clientes.php">
            <i class="fa fa-child"></i> <span>Clientes</span>
          </a>
        </li>
        <li class="<?php if(isset($active11)){echo $active11;}?>">
          <a href="usuarios.php">
            <i class="fa fa-users"></i> <span>Usuarios</span>
          </a>
        </li>
        <li class="<?php if(isset($active13)){echo $active13;}?>">
          <a href="puestos.php">
            <i class="fa fa-user"></i> <span>Puestos</span>
          </a>
        </li>
        <li class="<?php if(isset($active12)){echo $active12;}?>">
          <a href="configuracion.php">
            <i class="fa fa-cog"></i> <span>Configuración</span>
          </a>
        </li>
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>