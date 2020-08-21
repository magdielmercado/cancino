<?php	
	session_start();

	if (empty($_POST['requerimiento'])) {
           $errors[] = "Requerimiento vacío";
        } else if (
			!empty($_POST['requerimiento']) 
		){

		include "../config/config.php";//Contiene funcion que conecta a la base de datos

		$name=mysqli_real_escape_string($con,(strip_tags($_POST["requerimiento"],ENT_QUOTES)));
		$created_at=date("Y-m-d H:i:s");
		//$user_id=$_SESSION['user_id'];

		$sql="INSERT INTO tipos_requerimientos (name, created_at) VALUES (\"$name\", \"$created_at\")";
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "El Requerimiento ha sido ingresado satisfactoriamente.";
				//sleep(1);
				print("<script>window.location='./tipos_requerimientos.php'</script>");				
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
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

?>