<?php
	if (empty($_POST['rfccliente'])) {
           $errors[] = "ID vacío";
        }else if (empty($_POST['nombrecliente'])) {
           $errors[] = "Nombre vacío";
        } else if (
			!empty($_POST['rfccliente'])
		){

		include "../config/config.php";//Contiene funcion que conecta a la base de datos

		$rfccliente=mysqli_real_escape_string($con,(strip_tags($_POST["rfccliente"],ENT_QUOTES)));
		$nombrecliente=mysqli_real_escape_string($con,(strip_tags($_POST["nombrecliente"],ENT_QUOTES)));
		$contactocliente=mysqli_real_escape_string($con,(strip_tags($_POST["contactocliente"],ENT_QUOTES)));
		$telefonocliente=mysqli_real_escape_string($con,(strip_tags($_POST["telefonocliente"],ENT_QUOTES)));
		$correocliente=mysqli_real_escape_string($con,(strip_tags($_POST["correocliente"],ENT_QUOTES)));
		//$id=intval($_POST['mod_id']);


		//$cliente=mysqli_query($con, "select * from cliente where rfccliente=$rfccliente");
			//if (mysqli_num_rows($clientes)>0) {
			//	$errors []= "El Ruc Ya Existe.";
			//	
			//}else{
				$sql="UPDATE cliente 
				         SET nombrecliente =\"$nombrecliente\"
				           , contactocliente=\"$contactocliente\"
				           , telefonocliente=\"$telefonocliente\"
				           , correocliente=\"$correocliente\" 
				      WHERE rfccliente='$rfccliente'";
				$query_update = mysqli_query($con,$sql);
					if ($query_update){
						$messages[] = "El cliente ha sido actualizado satisfactoriamente.";
							//sleep(1);
							print("<script>window.location='./clientes.php'</script>");
					} else{
						$errors[]=$sql;
						//$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
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