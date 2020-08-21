<?php
	if (empty($_POST['mod_id'])) {
           $errors[] = "ID vacío";
        }else if (empty($_POST['ruc'])) {
           $errors[] = "Nombre vacío";
        } else if (
			!empty($_POST['ruc'])
		){

		include "../config/config.php";//Contiene funcion que conecta a la base de datos

		$empresa=mysqli_real_escape_string($con,(strip_tags($_POST["empresa"],ENT_QUOTES)));
		$encargado=mysqli_real_escape_string($con,(strip_tags($_POST["encargado"],ENT_QUOTES)));
		$email=mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));
		$ruc=mysqli_real_escape_string($con,(strip_tags($_POST["ruc"],ENT_QUOTES)));
		$id=intval($_POST['mod_id']);


		$clientes=mysqli_query($con, "select * from clientes where ruc=$ruc");
			//if (mysqli_num_rows($clientes)>0) {
			//	$errors []= "El Ruc Ya Existe.";
			//	
			//}else{
				$sql="UPDATE clientes SET business=\"$empresa\",fullname=\"$encargado\",email=\"$email\",ruc=\"$ruc\" WHERE id=$id";
				$query_update = mysqli_query($con,$sql);
					if ($query_update){
						$messages[] = "El cliente ha sido actualizado satisfactoriamente.";
							//sleep(1);
							print("<script>window.location='./clientes.php'</script>");
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