<?php	
	session_start();

	if (empty($_POST['ruc'])) {
           $errors[] = "RUC vacío";
        } else if (
			!empty($_POST['ruc']) 
		){

		include "../config/config.php";//Contiene funcion que conecta a la base de datos

		$empresa=mysqli_real_escape_string($con,(strip_tags($_POST["empresa"],ENT_QUOTES)));
		$encargado=mysqli_real_escape_string($con,(strip_tags($_POST["encargado"],ENT_QUOTES)));
		$email=mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));
		$ruc=mysqli_real_escape_string($con,(strip_tags($_POST["ruc"],ENT_QUOTES)));
		$created_at=date("Y-m-d H:i:s");
		//$user_id=$_SESSION['user_id'];

			$clientes=mysqli_query($con, "select * from clientes where ruc=$ruc");
			if (mysqli_num_rows($clientes)>0) {
				$errors []= "El Ruc Ya existe.";
				
			}else{

			$sql="INSERT INTO clientes (business, fullname, email, ruc, created_at) VALUES (\"$empresa\", \"$encargado\", \"$email\", \"$ruc\", \"$created_at\")";
			$query_new_insert = mysqli_query($con,$sql);
				if ($query_new_insert){
					$messages[] = "El cliente ha sido ingresado satisfactoriamente.";
					//sleep(1);
					print("<script>window.location='./clientes.php'</script>");
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