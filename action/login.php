<?php
    /*-------------------------
    Autor: Amner Saucedo Sosa
    Web: www.abisoftgt.net
    E-Mail: waptoing7@gmail.com
    ---------------------------*/
	session_start();

	if (isset($_POST['token']) && $_POST['token']!=='') {
			
	//Contiene las variables de configuracion para conectar a la base de datos
	include "../admin/config/config.php";

	$ruc=mysqli_real_escape_string($con,(strip_tags($_POST["ruc"],ENT_QUOTES)));
    $query = mysqli_query($con,"SELECT * FROM clientes WHERE ruc=\"$ruc\" ");

		if ($row = mysqli_fetch_array($query)) {
			
			if ($row['ban']==0) { //comprovamos que el usuario este activo
				$_SESSION['user_id'] = $row['id'];
				header("location: ../tickets.php");

			}else{
				$ban=sha1(md5("la cuenta fue baneada"));
				header("location: ../index.php?ban=$ban");
			}

		}else{
			$invalid=sha1(md5("contrasena y ruc invalido"));
			header("location: ../index.php?invalid=$invalid");
		}
	}else{
		header("location: ../");
	}

?>