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
        header("Location: ../problemas.php");  
    }
	$id=intval($_GET['id']);

	$sql=mysqli_query($con, "delete from kind where id=$id");
	if ($sql) {
		//echo "eliminado correctamente";
		header("location: ../problemas.php?deletesuccess");
	}else{
		//echo "hubo un error al eliminar";
		header("location: ../problemas.php?errordelete");
	}