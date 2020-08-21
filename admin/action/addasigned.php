<?php
	if (empty($_POST['ticked_id'])) {
           $errors[] = "Ticket vacío";
        } else if (
			!empty($_POST['ticked_id'])
		){

		include "../config/config.php";//Contiene funcion que conecta a la base de datos

		$asigned_id=mysqli_real_escape_string($con,(strip_tags($_POST["asigned_id"],ENT_QUOTES)));
		$tipo_requerimiento=mysqli_real_escape_string($con,(strip_tags($_POST["tipo_requerimiento"],ENT_QUOTES)));
		$id=mysqli_real_escape_string($con,(strip_tags($_POST["ticked_id"],ENT_QUOTES)));
		$atendido=date("Y-m-d H:i:s");

		$sql="UPDATE tickets SET status_id=2, asigned_id=\"$asigned_id\", tipo_requerimiento=$tipo_requerimiento,date_asigned=\"$atendido\" WHERE id=$id";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "La asignación ah sido ingresada satisfactoriamente.";

				//sleep(1);
				print("<script>window.location='./registrados.php'</script>");

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