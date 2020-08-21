<?php	
    /*-------------------------
    Autor: Amner Saucedo Sosa
    Web: www.abisoftgt.net
    E-Mail: waptoing7@gmail.com
    ---------------------------*/
	session_start();

    	if (!isset($_SESSION['user_id']) AND $_SESSION['user_id'] != 1) {
        header("location: ../index.php");
        exit;
        }

	/*Inicia validacion del lado del servidor*/
	if (isset($_POST['token']) && $_POST['token']!=null) {

		include "../admin/config/config.php";//Contiene funcion que conecta a la base de datos
		include "../lib/class.upload.php";


		$name = mysqli_real_escape_string($con,(strip_tags($_POST["name"],ENT_QUOTES)));
		$email = mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));
		$phone = mysqli_real_escape_string($con,(strip_tags($_POST["phone"],ENT_QUOTES)));
		$phone2 = mysqli_real_escape_string($con,(strip_tags($_POST["phone2"],ENT_QUOTES)));

		$contact = mysqli_real_escape_string($con,(strip_tags($_POST["contact"],ENT_QUOTES)));
		if($contact==1){
			$contact = "08:00am - 01:00pm";
		}else{
			$contact = "02:00pm - 06:00pm";
		}
		$kind_id = $_POST["kind_id"];

		$comment = mysqli_real_escape_string($con,(strip_tags($_POST["comment"],ENT_QUOTES)));
		$id_team = mysqli_real_escape_string($con,(strip_tags($_POST["id_team"],ENT_QUOTES)));
		$area = mysqli_real_escape_string($con,(strip_tags($_POST["area"],ENT_QUOTES)));
		$asunt = mysqli_real_escape_string($con,(strip_tags($_POST["asunt"],ENT_QUOTES)));
		$pass_team = mysqli_real_escape_string($con,(strip_tags($_POST["pass_team"],ENT_QUOTES)));
		$created_at=date("Y-m-d H:i:s");
		$client_id=$_SESSION['user_id'];
		$asigned_id=0;

		$status_id = 1;

            $query_id = mysqli_query($con, "SELECT RIGHT(number_ticket,6) as number_ticket FROM tickets ORDER BY number_ticket DESC LIMIT 1") or die('error '.mysqli_error($con));

            $count = mysqli_num_rows($query_id);

            if($count <> 0) {
            
                $data_id = mysqli_fetch_assoc($query_id);
                $codigo    = $data_id['number_ticket']+1;
            } else {
                $codigo = 1;
            }

            $buat_id   = str_pad($codigo, 6, "0", STR_PAD_LEFT);
            $ano = date("Y");
            $codigo = "B$ano - $buat_id";


			$number=mysqli_query($con, "select * from tickets");
			if (mysqli_num_rows($number)>0) {
					$number_ticket=$codigo;

			}else{
				$number_ticket="B$ano - 000363";
			}


			$handle = new Upload($_FILES['image']);
            if ($handle->uploaded) {
                $url="../images/ticket/";
                $handle->Process($url);
                $image = $handle->file_dst_name;
            }

		$sql="insert into tickets (name, email, phone, cell_phone, contact_schedule, kind_id, comment, image, area, asunt, id_team, pass_team, client_id, created_at, status_id, number_ticket,asigned_id) value (\"$name\",\"$email\",\"$phone\",\"$phone2\",\"$contact\",$kind_id,\"$comment\",\"$image\",$area,\"$asunt\",\"$id_team\",\"$pass_team\", $client_id, \"$created_at\", $status_id, \"$number_ticket\",$asigned_id)";

		$query_new_insert = mysqli_query($con,$sql);
		if ($query_new_insert){
			$messages= sha1(md5("Tu ticket ha sido ingresado satisfactoriamente."));
			header("location: ../addticket.php?success=$messages");
		} else{
			$errors= sha1(md5("Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con)));
			header("location: ../addticket.php?error=$errors");
			//echo "error:_".mysqli_error($con);
		}
		
}else{
	header("location: ../addticket.php");
}