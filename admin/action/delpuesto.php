<?php    
	session_start();
    include "../config/config.php";
    if (!isset($_SESSION['admin_id']) AND $_SESSION['admin_id'] != 1) {
        header("location: index.php");
        exit;
        }

	if (isset($_GET['idpuesto']) && !empty($_GET['idpuesto'])){
        $idpuesto=$_GET["idpuesto"];
    } else {
        header("Location: ../puestos.php");  
    }
	$idpuesto=intval($_GET['idpuesto']);

	$sql=mysqli_query($con, "delete from puesto where idpuesto=$idpuesto");
	if ($sql) {
		//echo "eliminado correctamente";
		header("location: ../puestos.php?deletesuccess");
	}else{
		//echo "hubo un error al eliminar";
		header("location: ../puestos.php?errordelete");
	}