<?php    
	session_start();
    include "../config/config.php";
    if (!isset($_SESSION['admin_id']) AND $_SESSION['admin_id'] != 1) {
        header("location: index.php");
        exit;
        }

	if (isset($_GET['rfccliente']) && !empty($_GET['rfccliente'])){
        $rfccliente=$_GET["rfccliente"];
    } else {
        header("Location: ../clientes.php");  
    }
	//$id=$_GET['id'];
    $sql = "delete from cliente where rfccliente = '$rfccliente'";
	$query=mysqli_query($con, $sql);
	if ($query) {
		//echo "eliminado correctamente";
		header("location: ../clientes.php?deletesuccess");
	}else{
		//echo "hubo un error al eliminar";
		header("location: ../clientes.php?errordelete");
	}