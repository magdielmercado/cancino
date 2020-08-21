<?php
	session_start();

	if (isset($_POST)) {
			
	//Contiene las variables de configuracion para conectar a la base de datos
	include "../config/config.php";

	$usuario=mysqli_real_escape_string($con,(strip_tags($_POST["usuario"],ENT_QUOTES)));
	$contrasena=sha1(md5(mysqli_real_escape_string($con,(strip_tags($_POST["contrasena"],ENT_QUOTES)))));

    $query = mysqli_query($con,"SELECT * FROM usuario WHERE usuario =\"$usuario\"  AND contrasena = \"$contrasena\";");

		if ($row = mysqli_fetch_array($query)) {
				$_SESSION['admin_id'] = $row['idusuario'];
				
				header("location: ../dashboard.php");
		}else{
			header("Location: ../index.php?alert=1");
		}
	}else{
		header("location: ../");
	}

?>