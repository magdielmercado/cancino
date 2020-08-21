<?php
	if (empty($_POST['usuario'])) {
        $errors[] = "Usuario vacío";
    } else if (!empty($_POST['usuario'])){
		include "../config/config.php";//Contiene funcion que conecta a la base de datos

		$idusuario=mysqli_real_escape_string($con,(strip_tags($_POST["idusuario"],ENT_QUOTES)));
		$usuario=mysqli_real_escape_string($con,(strip_tags($_POST["usuario"],ENT_QUOTES)));
		$contrasena=sha1(md5(mysqli_real_escape_string($con,(strip_tags($_POST["contrasena"],ENT_QUOTES)))));
		$nombreusuario=mysqli_real_escape_string($con,(strip_tags($_POST["nombreusuario"],ENT_QUOTES)));
		$idpuesto=mysqli_real_escape_string($con,(strip_tags($_POST["idpuesto"],ENT_QUOTES)));
		
		$sql = "UPDATE usuario
				   SET usuario = '$usuario'
--		       		  ,contrasena = '$contrasena'
		       		  ,nombreusuario = '$nombreusuario'
		       		  ,idpuesto = $idpuesto
		        WHERE idusuario = $idusuario;";
		$query_update = mysqli_query($con, $sql);
		if ($query_update){
			$messages[] = "El usuario ha sido actualizado satisfactoriamente.";
			if($_POST['contrasena']!=""){
				$sql_pass = mysqli_query($con, "UPDATE usuario SET contrasena=\"$contrasena\" WHERE idusuario=$idusuario");
				  if($sql_pass){
					$messages[] = " Y su contraseña se ha modificado.";			
				  }
			}
			print("<script>window.location='./usuarios.php?updatesuccess'</script>");
		} else{
			$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
		}
			//}		
	} else {
			$errors []= "Error desconocido.";
	}
		
	if (isset($errors)){			
		?>
		<div class="alert alert-danger" role="alert">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Error!</strong> 
				<?php
					foreach ($errors as $error) {
							echo $error;
						}
					?>
		</div>
		<?php
	}
	/*
	if (isset($messages)){
		
		?>
		<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>¡Bien hecho!</strong>
				<?php
					foreach ($messages as $message) {
							echo $message;
						}
					?>
		</div>
		<?php
	}
	*/
?>