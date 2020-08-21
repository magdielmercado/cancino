<?php	
	session_start();
	if (empty($_POST['nombrepuesto'])) {
           $errors[] = "Puesto vacío";
    } else if (!empty($_POST['nombrepuesto'])){

		include "../config/config.php";//Contiene funcion que conecta a la base de datos

		$nombrepuesto=mysqli_real_escape_string($con,(strip_tags($_POST["nombrepuesto"],ENT_QUOTES)));
		
		$usuarios=mysqli_query($con, "select * from puesto where nombrepuesto = '$nombrepuesto'");
		if (mysqli_num_rows($usuarios)>0) {
				$errors []= "El puesto ya existe.";
		}else{

				$sql="INSERT INTO puesto (nombrepuesto) VALUES ('$nombrepuesto')";
				$query_new_insert = mysqli_query($con,$sql);
					if ($query_new_insert){
						$messages[] = "El puesto ha sido ingresado satisfactoriamente.";
							//sleep(1);
							print("<script>window.location='./puestos.php'</script>");
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