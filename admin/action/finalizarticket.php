<?php    
	session_start();
    include "../config/config.php";
    if (!isset($_SESSION['admin_id']) AND $_SESSION['admin_id'] != 1) {
        header("location: index.php");
        exit;
        }

	if (isset($_GET['id']) && !empty($_GET['id'])){
        $id=$_GET["id"];
    } else {
        header("Location: ../atendido.php");  
    }
	$id=intval($_GET['id']);

	$sql=mysqli_query($con, "update tickets set status_id=4, finalizado=1 where id=$id");
	if ($sql) {
		//echo "eliminado correctamente";
		header("location: ../atendidos.php?success");

	}else{
		//echo "hubo un error al eliminar";
		header("location: ../atendidos.php?error");
	}