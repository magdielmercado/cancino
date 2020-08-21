<?php
	session_start();

	if (!isset($_SESSION['admin_id']) && $_SESSION['admin_id']==null) {
		header("location: ../");
	}

	include "../config/config.php";

	$idusuario = $_SESSION['admin_id'];
	$usuario = mysqli_real_escape_string($con,(strip_tags($_POST["usuario"],ENT_QUOTES)));
	$contrasena = sha1(md5(mysqli_real_escape_string($con,(strip_tags($_POST["contrasena"],ENT_QUOTES)))));
	$confirmarcontrasena = sha1(md5(mysqli_real_escape_string($con,(strip_tags($_POST["confirmarcontrasena"],ENT_QUOTES)))));
	$nombreusuario = mysqli_real_escape_string($con,(strip_tags($_POST["nombreusuario"],ENT_QUOTES)));
	$idpuesto = mysqli_real_escape_string($con,(strip_tags($_POST["idpuesto"],ENT_QUOTES)));


	if($idpuesto == 1)
	{
		if($contrasena == $confirmarcontrasena)
		{
			$sql = "UPDATE usuario
					   SET  nombreusuario = \"$nombreusuario\"
					      , contrasena=\"$contrasena\"
					where idusuario=$idusuario";
			$update=mysqli_query($con, $sql);
			if ($update) 
           		header("location: ../profile.php?success");
	   		else
            	header("location: ../profile.php?error");
		}
		else
			header("location: ../profile.php?errorcontrasena");
	}
	else
	{
		header("location: ../profile.php?errorpermisos");
	}

?>