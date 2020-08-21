<?php    
	session_start();
    include "../config/config.php";
    if (!isset($_SESSION['admin_id']) AND $_SESSION['admin_id'] != 1) {
        header("location: index.php");
        exit;
        }

	if (isset($_GET['idusuario']) && !empty($_GET['idusuario'])){
        $idusuario=$_GET["idusuario"];
    } else {
        header("Location: ../usuarios.php");  
    }
	$idusuario=intval($_GET['idusuario']);

	$sql=mysqli_query($con, "delete from usuario where idusuario = $idusuario");
	if ($sql) {
		//echo "eliminado correctamente";
		header("location: ../usuarios.php?deletesuccess");
	}else{
		//echo "hubo un error al eliminar";
		header("location: ../usuarios.php?errordelete");
	}