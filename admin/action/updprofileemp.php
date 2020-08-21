<?php
	session_start();

	if (!isset($_SESSION['admin_id']) && $_SESSION['admin_id']==null) {
		header("location: ../");
	}

	include "../config/config.php";

	$id = $_SESSION['admin_id'];
	$usuario = mysqli_real_escape_string($con,(strip_tags($_POST["usuario"],ENT_QUOTES)));
	$nombre = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
	$apellidos = mysqli_real_escape_string($con,(strip_tags($_POST["apellidos"],ENT_QUOTES)));
	$email = mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));



		$update=mysqli_query($con,"UPDATE user set username=\"$usuario\", name=\"$nombre\", lastname=\"$apellidos\", email=\"$email\" where id=$id");
		if ($update) {

           // print "Datos Actualizados.";
          	 header("location: ../profile.php?success");
	   	}

	   	// CHANGE PASSWORD
		if($_POST['password']!=""){

			$password = sha1(md5(mysqli_real_escape_string($con,(strip_tags($_POST["password"],ENT_QUOTES)))));
			$new_password = sha1(md5(mysqli_real_escape_string($con,(strip_tags($_POST["new_password"],ENT_QUOTES)))));
			$confirm_new_password = sha1(md5(mysqli_real_escape_string($con,(strip_tags($_POST["confirm_new_password"],ENT_QUOTES)))));

			if($_POST['new_password']==$_POST['confirm_new_password']){

				$sql = mysqli_query($con,"SELECT * from user where id=$id");
				while ($row = mysqli_fetch_array($sql)) {
			    	$p = $row['password'];
				}

				if ($p==$password){ //comprobamos que la contraseña sea igual ala anterior

					$update_passwd=mysqli_query($con,"UPDATE user set password=\"$new_password\" where id=$id");
					if ($update_passwd) {
						//$success_pass=sha1(md5("contrasena actualizada"));
            			header("location: ../profile.php?success_pass");
						//echo "pass actualizada";
					}
				}else{
					//$invalid=sha1(md5("la contrasena no coincide la contraseña con la anterior"));
            		header("location: ../profile.php?invalid");
				}
			}else{
				//$error=sha1(md5("las nuevas  contraseñas no coinciden"));
            	header("location: ../profile.php?error");
			}
		}


?>