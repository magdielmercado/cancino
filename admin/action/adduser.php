<?php	
	session_start();

	 if (!empty($_POST['usuario']) 
		){

		include "../config/config.php";//Contiene funcion que conecta a la base de datos

		
		$usuario=mysqli_real_escape_string($con,(strip_tags($_POST["usuario"],ENT_QUOTES)));
		$contrasena=sha1(md5(mysqli_real_escape_string($con,(strip_tags($_POST["contrasena"],ENT_QUOTES)))));
		$nombreusuario=mysqli_real_escape_string($con,(strip_tags($_POST["nombreusuario"],ENT_QUOTES)));
		$idpuesto=mysqli_real_escape_string($con,(strip_tags($_POST["idpuesto"],ENT_QUOTES)));
		
		//$user_id=$_SESSION['user_id'];
		
		if (isset($_POST['is_admin'])) {
			$is_admin=1;
		}else{
			$is_admin=0;
		}

		$profile_pic="default.png";


		$sql=mysqli_query($con, "select * from usuario where usuario='$usuario'");
			if (mysqli_num_rows($sql)>0) {
				$errors []= "El Usuario Ya existe.";
				
			}else{

				$sql="INSERT INTO usuario (usuario,contrasena,nombreusuario, idpuesto) VALUES (\"$usuario\", \"$contrasena\", \"$nombreusuario\", \"$idpuesto\")";
				$query_new_insert = mysqli_query($con,$sql);
					if ($query_new_insert){
						$messages[] = "El usuario ha sido ingresado satisfactoriamente.";
							//sleep(1);
							print("<script>window.location='./usuarios.php?addsuccess'</script>");
					} else{
						$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
					}
			}
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