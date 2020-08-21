<?php
	if (empty($_POST['mod_id'])) {
           $errors[] = "ID Ticket vacío";
        }else if (empty($_POST['comentario'])) {
           $errors[] = "Incidencia vacío";
        } else if (
			!empty($_POST['comentario'])
		){

		include "../config/config.php";//Contiene funcion que conecta a la base de datos
		
		$comentario=mysqli_real_escape_string($con,(strip_tags($_POST["comentario"],ENT_QUOTES)));
		$id=intval($_POST['mod_id']);
		$atendido=date("Y-m-d H:i:s");

		$sql="UPDATE tickets SET status_id=4, finalizado=\"$comentario\", date_atendid=\"$atendido\" WHERE id=$id";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "El ticket ah sido atendido satisfactoriamente.";

				//sleep(1);
				print("<script>window.location='./atendidos.php'</script>");
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